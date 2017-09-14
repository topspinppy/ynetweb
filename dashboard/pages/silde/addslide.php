<?php include("../../../connect.php") ?>
<?php session_start(); ?>
<?php
  /**************************************/

  $slide_link = $_POST["slide_link"];
  $slide_status = trim($_POST["slide_status"]);
  $upload = $_FILES["slide_file"]["name"];
  $image_type = $_FILES['slide_file']['type'];
  $remove_these = array(' ','`','"','\'','\\','/','_');
  $newname = str_replace($remove_these, '', $upload);
  $image_info = getimagesize($_FILES['slide_file']['tmp_name']);
  $width = $image_info[0];
  $height = $image_info[1];
  if($width == 1045 && $height == 271)
  {
    move_uploaded_file($_FILES['slide_file']['tmp_name'],"../../../img/slide/".$newname);
    $us = $_SESSION['usernameadmin'];
    $strSQL  = "INSERT INTO slideshow (slide_key,slide_file,slide_link,slide_status,slide_insert,uploadby) VALUES (null,'".$newname."','$slide_link','$slide_status','".date("Y-m-d H:i:s")."','$us')";
    $objQuery = mysqli_query($connect,$strSQL) or die (mysqli_error($connect));
            echo "0";
  }
  else
  {
        echo "1";
  }
?>
