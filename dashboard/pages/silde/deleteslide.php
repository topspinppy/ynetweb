<?php include("../../../connect.php") ?>
<?php

$a = $_GET["key"];
$SQL = "DELETE  FROM  slideshow  WHERE slide_key = '$a'";
$query = mysqli_query($connect,$SQL) or die(mysqli_error($connect));
header("Refresh:0");
?>
