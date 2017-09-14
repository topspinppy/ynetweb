<?php
$connect = @mysqli_connect("localhost", "root", "", "ynetbangkok")
 			       or die(mysqli_connect_error());
mysqli_set_charset($connect,"utf8");

?>
