<?php include("../../../connect.php") ?>
<?php session_start(); ?>
<?php
  $news_title = trim($_POST["news_title"]);
  $news_type = trim($_POST["news_type"]);
  $news_detail = trim($_POST["news_detail"]);
  $news_status = trim($_POST["news_status"]);
?>

<?php
    if(move_uploaded_file($_FILES["img_news_file"]["tmp_name"],"imgnews/".$_FILES["img_news_file"]["name"]))
    {
        $us = $_SESSION['usernameadmin'];
    		$strSQL  = "INSERT INTO news (id_news,head_news,description_news,images,id_type_news,dates,admin_name,news_status) VALUES (null,'$news_title','$news_detail','".$_FILES["img_news_file"]["name"]."','$news_type','".date("Y-m-d H:i:s")."','$us','$news_status')";
        $objQuery = mysqli_query($connect,$strSQL) or die (mysqli_error($connect));
        echo "0";
    }
    else
    {
        $us = $_SESSION['usernameadmin'];
        $strSQL  = "INSERT INTO news (id_news,head_news,description_news,id_type_news,dates,admin_name,news_status) VALUES (null,'$news_title','$news_detail','$news_type','".date("Y-m-d H:i:s")."','$us','$news_status')";
        $objQuery = mysqli_query($connect,$strSQL) or die (mysqli_error($connect));
        echo "1";
    }
?>
