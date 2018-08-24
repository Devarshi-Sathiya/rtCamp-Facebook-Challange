<?php
if (!session_id()){session_start();}

if(isset($_GET['q']) && $_GET['q'] == 'logout') {
    $token = $_SESSION['fb_access_token'];
    
    $_SESSION['fb_access_token'] = '';

$_SESSION['fb_id'] = '';
$_SESSION['fb_name'] = ''; 
session_destroy();
    $url = 'https://www.facebook.com/logout.php?next=https://www.devarshi.xyz/&access_token='.$token;
    
    header('Location: '.$url);
}

if(isset($_POST['$isstring']) && $_POST['$isstring'] != '') {
    $link = '';
    $post = $_POST['$isstring'];
    $postFilter = explode('=====', $post);
    foreach($postFilter as $finalS) {
        $link .= '<img class="slideShowImage mySlides fade" src="'.$finalS.'">';
    }
    echo $link;
}

if(isset($_POST['$masterarray']) && !empty($_POST['$masterarray'])) {
    $zip = new ZipArchive();
    $fbloginU = $_SESSION['fb_name']; 
    $fbloginU = str_replace(' ', '_', $fbloginU);
    $rand = rand(999, 99999);
    $file_names =$_POST['$masterarray'];
    $folderName = $rand.'_facebook_'.$fbloginU.'_albums';
    
    foreach($file_names as $key=>$file_names1) {
        @mkdir($folderName.'/'.$key, 0777, true);    
        foreach($file_names1 as $file_names2) {
            $file_names2 = str_replace('undefined', '', $file_names2);
        	$dw = file_get_contents($file_names2);
        	$UBI1 = explode('?', $file_names2);
    		if(!empty($UBI1) && isset($UBI1[0])) {
    			$UBI11 = explode('/', $UBI1[0]);
    			if(!empty($UBI11)) {
    				$fileName = end($UBI11);
    				file_put_contents($folderName.'/'.$key.'/'.$fileName, $dw);
    			}
    		}
        }
    }
    
    
    $path = realpath(__DIR__);
    $zip = new ZipArchive();
    $zip->open($folderName.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderName.'/'));
    foreach ($files as $name => $file)
    {
    	if ($file->isDir()) {
    		flush();
    		continue;
    	}
    	$filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($path) + 1);
        $zip->addFile(realpath($name), $relativePath);
    }
    $zip->close();
    delete_directory($folderName);
    $url = 'https://devarshi.xyz/'.$folderName.'.zip';
    echo $url;
    exit;
}

function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}

header('Location: https://devarshi.xyz/');
?>