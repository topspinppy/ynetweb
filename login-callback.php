<?php
session_start();
ini_set('display_errors', 1);
require_once __DIR__ . '\src\Facebook\autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;


$fb = new Facebook\Facebook([
  'app_id' => '1434169859982544',
  'app_secret' => 'b6e3ca8a26c5fd45a57f1b7cf3692edd',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
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
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']

  $response = $fb->get('/me?fields=id,name,gender,email,link', $accessToken);

  $user = $response->getGraphUser();
  echo'<pre>';
  print_r($user);
  echo'</pre>';

  //echo 'ID: ' . $user['id'];
  //echo 'Name: ' . $user['name'];
  //echo 'Gener: ' . $user['gener'];
  //echo 'Email: ' . $user['email'];
  //echo 'Link: ' . $user['link'];

	include("connect.php");

	// Check Exists ID
	$strSQL = "SELECT * FROM member WHERE facebook_id = '".$user['id']."' ";
	$objQuery = mysqli_query($connect,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
		$_SESSION["username"] = $user['name'];
		header("location:index.php");
		exit();
	}
	else
	{
		// Create New ID
      $facebookid = trim($user['id']);
      $name= trim($user['name']);
      $email=trim($user['email']);
      $link=trim($user['link']);
      $date=trim(date("Y-m-d H:i:s"));
			$strPicture = "https://graph.facebook.com/".$user['id']."/picture?type=large";

      $sql = "insert INTO member (id_member,name,email,facebook_id,link,date,picture) VALUES ('','$name','$email','$facebookid','$link','$date','$strPicture')";
			$objQuery = mysqli_query($connect,$sql) or die (mysqli_error($connect));

		  $_SESSION["username"] = $user['name'];
      $_SESSION["picture"] = $str;
			header("location:index.php");
			exit();
	}

	mysqli_close($connect);


}

?>
