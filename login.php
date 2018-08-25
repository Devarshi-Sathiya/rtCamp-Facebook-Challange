<?php
if (!session_id()) {
    session_start();
}


require_once __DIR__ . '/lib/Facebook/autoload.php'; 

$fb = new \Facebook\Facebook([
  'app_id' => '1543198355780368', // Replace {app-id} with your app id
  'app_secret' => '806d2483c9d439a104f032da52764ac0',
  'default_graph_version' => 'v3.1',
  'persistent_data_handler' => 'session'
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://devarshi.xyz/fb-callback.php', $permissions);

//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="common/css/login.css">
        <link rel="stylesheet" href="common/css/all.css">
    </head>    
    <body>
        <a href="<?=htmlspecialchars($loginUrl)?>">
        <div class="holder">
  		    <div class="comer"></div>
      		<div class="icon-holder">
        		<center><i class="fab fa-facebook-f facebook-icon"></i></center>
      		</div>
      		<div class="text">Login With Facebook</div>
	    </div>
	    </a>

	<span class="footer">
	<span>Created with<img class="image" src="common/icons/hearts.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; by <a class="link" target="_blank" href="http://www.devarshi.xyz">Devarshi Sathiya</a>.</span>
	<br>
	<span>We don't store your data except the photos on the server for a while.</span>
	</span>
    </body>
    
</html>