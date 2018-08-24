<?php
include 'lib/gdrive.php';

$client = new Google_Client();

// Get your credentials from the console
$client->setClientId('');
$client->setClientSecret('');
$client->setRedirectUri('');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));

session_start();

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $client->authenticate($code);
    $_SESSION['gdrivecode_access_array'] = $client->getAccessToken();
    $_SESSION['gdrivecode_access_token'] = $_SESSION['gdrivecode_access_array']['access_token'];

    header('Location: home.php');
}

if(isset($_SESSION['gdrivecode_access_token'])) {
    ini_set('max_execution_time',600);
    $client->setAccessToken($_SESSION['gdrivecode_access_token']);
    
    $service = new Google_Service_Drive($client);
    
    if(isset($_POST['$masterarray']) && !empty($_POST['$masterarray']) ) {
        $file_names =$_POST['$masterarray'];
        
        $fbloginU = $_SESSION['fb_name']; 
        $fbloginU = str_replace(' ', '_', $fbloginU);
        $UserFolder = new Google_Service_Drive_DriveFile(array(
        'name' => 'facebook_'.$fbloginU.'_albums',
        'mimeType' => 'application/vnd.google-apps.folder'));
        
        $temp1 = $service->files->create($UserFolder, array(
        'fields' => 'id'));
        $UserFolderId = $temp1->id;
        
        foreach($file_names as $key=>$files1) {
            $subFolName = $key;
            
            $UserSubFolder = new Google_Service_Drive_DriveFile(array(
            'name' => $subFolName,
            'mimeType' => 'application/vnd.google-apps.folder', 'parents' => array($UserFolderId)));
           
            $temp2 = $service->files->create($UserSubFolder, array(
            'fields' => 'id'));
            $UserSubFolderId = $temp2->id;
            
            //$files1 = array_slice($files1, 0, 1);
            
            $Uniq = rand(999, 99999).time().'.jpg';
            foreach($files1 as $files2)
            {
            	/*$UBI1 = explode('?', $files2);
        		if(!empty($UBI1) && isset($UBI1[0])) {
        			$UBI11 = explode('/', $UBI1[0]);
        			if(!empty($UBI11)) {
        				$fileName = end($UBI11);*/
        	            
        
                        $file = new Google_Service_Drive_DriveFile();
                        $file->setName($Uniq);
                        $file->setDescription('A test document');
                        $file->setMimeType('image/jpeg');
                        $file->setParents(array($UserSubFolderId));
                        
                        //$files2 = str_replace('undefined', '', $files2);

                        $data = file_get_contents($files2);
                    
                        $createdFile = $service->files->create($file, array(
                          'data' => $data,
                          'mimeType' => 'image/jpeg',
                          'uploadType' => 'multipart',
                          'fields' => 'id'
                        ));		    
        			    
        			/*}
        		}*/
            }
        }
    
        
    
        $result = array('isLogin' => true);
        echo json_encode($result, true);
    }
} else {
    $authUrl = $client->createAuthUrl();
    $result = array('isLogin' => false, 'link' => $authUrl);
    echo json_encode($result, true);
}
?>