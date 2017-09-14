
<?php
session_start();

if(isset($_SESSION["usernameadmin"])) {
	session_destroy();
	unset($_SESSION["usernameadmin"]);
	header("Location: ../../index.php");
} else {
	header("Location: ../../index.php");
}
?>
