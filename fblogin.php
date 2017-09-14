<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9&appId=1434169859982544";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
ini_set('display_errors', 1);
require_once __DIR__ . '/src/Facebook/autoload.php';

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

$permissions = ['email', 'user_likes']; // optional

$loginUrl = $helper->getLoginUrl('http://localhost/ynetbkk/login-callback.php', $permissions);
function showloginfb($loginUrl)
{
    echo '<a href="' . $loginUrl . '" class="btn btn-block btn-social btn-facebook" ><span class="fa fa-facebook"></span> Sign in with facebook</a> ';
}
?>
