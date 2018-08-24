<?php
session_start();

if (isset($_SESSION['fb_access_token']) && $_SESSION['fb_access_token'] != '') {
    $url = "https://graph.facebook.com/v3.1/me/photos?fields=picture%2Calbum%2Cname&type=uploaded&limit=1000&access_token=".$_SESSION['fb_access_token'];
    $headers = array("Content-type: application/json");
    
       
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
     curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
     curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
     curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
       
     $st=curl_exec($ch); 
     $result=json_decode($st,TRUE);
     $data = $result['data'];
     $ResultArray=array();
     foreach ($data as $item) {
      if (isset($item['album']['name'])) {
          $albumname = $item['album']['name'];
          
          if(array_key_exists($albumname,$ResultArray)){
              $ResultArray[$albumname][]=$item;    
          } else {
              $ResultArray[$albumname][0] = $item;    
          }
      } 
     }
     
} else { 
  header('Location: login.php');
} 

?>