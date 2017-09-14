<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>เครือข่ายยุวทัศน์ กรุงเทพมหานคร | Youth Network Of Bangkok</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
  	<link rel="stylesheet" type="text/css" href="https://lipis.github.io/bootstrap-social/assets/css/font-awesome.css">
  	<link href="js/lightbox/src/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
  	<link rel="stylesheet" type="text/css" href="style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel=”shortcut icon” href=”http://www.enjoyday.net/images/youricon.ico” />


    <!--favicon-->
    <?php
				$sqlfavicon = "SELECT * FROM `components` WHERE `id`= '7'";
				$queryfavicon = mysqli_query($connect,$sqlfavicon) or die(mysqli_error($connect));
				$resultfavicon = mysqli_fetch_array($queryfavicon,MYSQLI_ASSOC);
		?>
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/<?php echo $resultfavicon["data"];?>">
    <!--favicon-->
  </head>

  <!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  <script src="js/validation.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/lightbox/src/js/lightbox.js"></script>
  <script src="js/script.js"></script>
  <script>
  	  $('.carousel').carousel({
  		     interval: 5000 //changes the speed
  	  })
  </script>
