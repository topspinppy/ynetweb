<?php include('../../../connect.php'); ?>
<?php
$news = $_GET['key'];
if($_GET['sts'] == "1")
{
        $sqlza = "UPDATE slideshow SET slide_status = '0' WHERE slide_key = '$news' ";
        if(mysqli_query($connect,$sqlza))
        {
            echo "success";
        }
        else
        {
            echo "unsuccess";
        }

}
else
{
        $sqlza = "UPDATE slideshow SET slide_status = '1' WHERE slide_key = '$news' ";
        mysqli_query($connect,$sqlza);
}
?>
