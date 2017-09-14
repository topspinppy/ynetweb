<?php include('../../../connect.php'); ?>
<?php
      $about = $_GET["about"];
      $id = $_GET['id'];
      $sts = $_GET['sts'];
      if($about == "activity")
      {
            $sql = "UPDATE components SET status = '$sts' WHERE id = '$id'";
            $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
      }
      else if($about == "publicrelations")
      {
            $sql = "UPDATE components SET status = '$sts' WHERE id = '$id'";
            $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
            echo $about;
      }
      else if($about == "auction")
      {
            $sql = "UPDATE components SET status = '$sts' WHERE id = '$id'";
            $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
      }
      else if($about == "download")
      {
            $sql = "UPDATE components SET status = '$sts' WHERE id = '$id'";
            $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
      }
?>
