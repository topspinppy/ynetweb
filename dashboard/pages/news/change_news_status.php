<?php include('../../../connect.php'); ?>
<?php
$news = $_GET['news'];
if($_GET['sts'] == "1")
{
        $sqlz = "UPDATE news SET news_status = '0' WHERE id_news = '$news' ";
        mysqli_query($connect,$sqlz);
}
else
{
        $sqlz = "UPDATE news SET news_status = '1' WHERE id_news = '$news' ";
        mysqli_query($connect,$sqlz);
}
?>
