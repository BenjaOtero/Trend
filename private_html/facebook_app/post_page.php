<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
// Test 2
/*$fb = new Facebook\Facebook([
  'app_id' => '1715045665392047',
  'app_secret' => '91a615e54a1f135b0bf80c5b373ef220',
  'default_graph_version' => 'v2.5',
  ]);*/
//Aplicacion principal
$fb = new Facebook\Facebook([
  'app_id' => '1714527668777180',
  'app_secret' => '4aee42197519642be3adf12b6093f652',
  'default_graph_version' => 'v2.5',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = array( 
		"manage_pages",
		"publish_actions",
                "publish_pages"
		);  
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
        $linkData = [
          'message' => 'User provided message',
          "link"=>  "http://karminna.com",
          ];          
        $pages_request = $fb->get('/me/accounts?fields=name,access_token');                                
        $pages = $pages_request->getGraphEdge()->asArray();  
        foreach ($pages as $page) {
          $pageAccessToken = $page['access_token'];
          // Store $pageAccessToken and/or
          // send requests to Graph on behalf of the page
        }       
        $token_page = $page['access_token'];   
        var_dump($pages);
      /*  $response2 = $fb->post("/1673807476233899/feed", $linkData, $token_page);
        $graphNode = $response2->getGraphNode();
        echo 'Posted with id: ' . $graphNode['id'];*/
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	//$loginUrl = $helper->getLoginUrl('http://localhost/Trend/private_html/facebook_app/post_page.php', $permissions);
	$loginUrl = $helper->getLoginUrl('https://trendsistemas.com/facebook_app/post_page.php', $permissions);
        
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}

	
        // parametros posibles para $linkData
	/* $post = array( 
		"access_token"=>$session["access_token"],
		"description"=>"Te has suscrito a la aplicaciÃ³n del curso de Facebook que ha creado Polin para el 2011",
		"link"=>$appUrl . "?redirect=" . base64_encode("http://p0l.in"),
		"caption"=>"AplicaciÃ³n de pruebas por Polin",
		"picture"=>"http://i265.photobucket.com/albums/ii229/polinidoocom/logo/v1_1/polin_logo_260x260.gif",
		"name"=>"AplicaciÃ³n de pruebas Polin"
		);      */       
