<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1724723101076612',
  'app_secret' => '6ef2d350d85ca2d6b8d1ba980857330e',
  'default_graph_version' => 'v2.5',
  ]);
/*$fb = new Facebook\Facebook([
  'app_id' => '1714693898760557',
  'app_secret' => '822940b1438ef2ea54a8cecf86303d1f',
  'default_graph_version' => 'v2.5',
  ]);*/
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
} else {
        $accessToken = $helper->getAccessToken();
}
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
        echo "<p style= color: #ffffff;>Aleluya ! ! !</p>";
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
        //  header('landing_page.php');
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('https://trendsistemas.com/facebook_app/login.php', $permissions);
	//$loginUrl = $helper->getLoginUrl('http://localhost/Trend/private_html/facebook_app/login.php', $permissions);
	echo '<a href="' . $loginUrl . '"><img id="login" src="app_images/btn_login_facebook.gif"></a>';
}

