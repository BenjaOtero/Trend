<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
 
//Benjamin Garzon Test 1
/*$fb = new Facebook\Facebook([
  'app_id' => '1714693898760557',
  'app_secret' => '822940b1438ef2ea54a8cecf86303d1f',
  'default_graph_version' => 'v2.5',
  ]);

//Aplicacion principal Benjamin Garzon
/*$fb = new Facebook\Facebook([
  'app_id' => '1714527668777180',
  'app_secret' => '4aee42197519642be3adf12b6093f652',
  'default_graph_version' => 'v2.5',
  ]);*/

//Aplicacion principal Benjamin Otero
$fb = new Facebook\Facebook([
  'app_id' => '544765529019244',
  'app_secret' => '4b3ab8b5e68d01d8da2a0a3fb0b5c43a',
  'default_graph_version' => 'v2.5',
  ]);

$helper = $fb->getRedirectLoginHelper();

// app directory could be anything but website URL must match the URL given in the developers.facebook.com/apps
define('APP_URL', 'http://sohaibilyas.com/APP_DIR/');

$permissions = array( 
		"manage_pages",
		"publish_actions",
                "publish_pages"
		);  
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
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

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ./');
	}

	// validating user access token
	try {
		$user = $fb->get('/me');
		$user = $user->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// if access token is invalid or expired you can simply redirect to login page using header() function
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
        $linkData = [
          'app_id' => '544765529019244',
          "position"=>  "1",
          "custom_name"=>  "Sorteo Mortal!!!"
          ];  
	$pages = $fb->get('/me/accounts');
	$pages = $pages->getGraphEdge()->asArray();

	?>
	<form action="" method="POST">
		<select name="page" single>
	<?php
	foreach ($pages as $key) {
		?>
		<option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
		<?php
	}
	?>
	</select>
	<input type="submit" name="submit">
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$page = $fb->get('/' . $_POST['page'] . '?fields=access_token, name, id');
		$page = $page->getGraphNode()->asArray();
		
		$addTab = $fb->post('/' . $page['id'] . '/tabs', $linkData, $page['access_token']);
		$addTab = $addTab->getGraphNode()->asArray();
		print_r($addTab);
	}
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
       // $loginUrl = $helper->getLoginUrl('http://localhost/Ecommerce/trunk/public_html/fblogin-v5/create_tab.php', $permissions);
        $loginUrl = $helper->getLoginUrl('https://trendsistemas.com/facebook_app/', $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}
