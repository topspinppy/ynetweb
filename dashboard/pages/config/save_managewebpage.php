<?php include('../../../connect.php'); ?>
<?php

      $sql_name="";
      $count=0;
      $name_website = $_POST["name_website"];
      $name_website_eng = $_POST["name_website_eng"];
      $img = $_FILES["site_favicon"]["name"];

      //
      $sqlactivity = "SELECT * FROM `components` WHERE `id`= '6'";
      $queryactivity = mysqli_query($connect,$sqlactivity) or die(mysqli_error($connect));
      $resultactivity = mysqli_fetch_array($queryactivity,MYSQLI_ASSOC);
      //

      if($name_website == $resultactivity["data"])
      {
         $sql_name ="";
      }
      else
      {
         $sql_name = "data = '$name_website',";
         $count++;
      }
      if($name_website_eng == $resultactivity["data2"])
      {
         $sql_name .="";
      }
      else
      {
         $sql_name .="data2 = '$name_website_eng' ";
         $count++;
      }

      if($count == 1)
      {
         $countnews = strlen($sql_name);
         $sql_name = substr_replace($sql_name,"",$countnews-1);
      }

      if(empty($img))
      {
          $sql = "UPDATE `components` SET $sql_name WHERE `id` = '6'";
          mysqli_query($connect,$sql) or die(mysqli_error($connect));
          echo "0";
      }
      else
      {
          move_uploaded_file($_FILES["site_favicon"]["tmp_name"],"../../../img/favicon/".$_FILES["site_favicon"]["name"]);
          $sql2 = "UPDATE `components` SET data='$img' WHERE `id` = '7'";
          mysqli_query($connect,$sql2) or die(mysqli_error($connect));

          if($sql1  || $sql2 )
          {
              echo "0";
          }
          else {
              echo "Error";
          }
      }

      mysqli_close($connect);
      // if($img == "")
      // {
      //     echo "0";
      // }
      // else
      // {
      //   //
      //   $sqlfa = "";
      //   $sqlfavicon = "SELECT * FROM `components` WHERE `id`= '7'";
      //   $queryfavicon = mysqli_query($connect,$sqlfavicon) or die(mysqli_error($connect));
      //   $resultfavicon = mysqli_fetch_array($queryfavicon,MYSQLI_ASSOC);
      //   //
      //   if($img == $resultfavicon)
      //   {
      //     $sqlfa = "";
      //   }
      //   else {
      //     $sqlfa = "data = '$img'";
      //
      //   }
      //   echo $sql1 = "UPDATE `components` SET $sqlfa  WHERE `id` = '7'";
      //   //mysqli_query($connect,$sql1) or die(mysqli_error($connect));
      //   echo "0";
      // }

 ?>
 <?php
    //  if(move_uploaded_file($_FILES["img_news_file"]["tmp_name"],"imgnews/".$_FILES["img_news_file"]["name"]))
    //  {
    //      $sql = "UPDATE components SET name_components = '$name_website' WHERE id = '6'";
    //      mysqli_query($connect,$sql) or die(mysqli_error($connect));
     //
    //      $sql = "UPDATE components SET data = '$name_website' WHERE id = '6'";
    //      mysqli_query($connect,$sql) or die(mysqli_error($connect));
    //      echo "0";
    //  }
    //  else
    //  {
    //    $sql = "UPDATE components SET status = '$sts' WHERE id = '$id'";
    //    $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    //      echo "1";
    //  }
 ?>
