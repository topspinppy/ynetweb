<meta charset="utf-8">
<?php session_start(); ?>
<?php include("connect.php") ?>
<?php
		$fp=fopen("./template/component/doctypes.txt","r");
		fpassthru($fp);
?>
<?php

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $pass2 = $_POST["password2"];
    $email = $_POST["emails"];
    $namesur = $_POST["namesurname"];
    $captchaz = $_POST["captchaz"];
    $err = "";

    if($pass !== $pass2)
    {
       $err .= "ใส่รหัสผ่านทั้งสองไม่ตรงกัน";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
       $err .= "อีเมล์ไม่ถูกต้องตามรูปแบบ";
    }

    $sql = "SELECT COUNT(*) FROM member WHERE email = '$email'";
    $rs = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($rs);
    if($data[0] != 0)
    {
       $err .= "อีเมล์นี้เป็นสมาชิกอยู่แล้ว";
    }
    if($captchaz !== $_SESSION['captcha'])
    {
       $err .= "ใส่อักขระไม่ตรงกับภาพ";
    }

    if($err != "")
    {
      echo "<script> alert('$err'); window.location.href='index.php'; </script>";
    }
    else
    {
      $rand = mt_rand(100000,999999); //verify code
      mysqli_set_charset($connect,"utf8");
      $sql = "insert INTO member (id_member, username, password, name,email,verify,type) VALUES ('','$user','$pass','$namesur','$email','$rand','member')";
      mysqli_query($connect,$sql);

      $sqlzz = "SELECT * FROM member WHERE username = '$user'";
      $rzz = mysqli_query($connect, $sqlzz) or die(mysqli_error($connect));
      $datae = mysqli_fetch_array($rzz,MYSQLI_ASSOC);
      $veri = $datae["verify"];


      $server = $_SERVER["SERVER_NAME"];

			include "thaimailer.php";
			mail_from("admin<admin@ynetbangkok.or.th>");
			mail_to($email);
			mail_subject("Activate Member Account | YNETBANGKOK.OR.TH");

  		$strMessage = "Welcome : ".$namesur."<br> ยินดีต้อนรับสู่เว็บไซต์เครือข่ายยุวทัศน์ กรุงเทพมหานคร<br>";
  		$strMessage .= "=================================<br>";
  		$strMessage .= "กรุณาคลิกลิงก์ด้านล่างเพื่อเข้าสู่การยืนยันการสมัครสมาชิก <br>";
  		$strMessage .= "คลิกที่นี่เพื่อยืนยันการสมัครสมาชิก --->"."<a href='$server/verify.php?idverify=".$veri."'>$server/verify.php?idverify=$veri</a><br>";
  		$strMessage .= "=================================<br>";
  		$strMessage .= "ขอบคุณครับ Ynetbangkok.or.th<br>";
			mail_body("hi",true);

			if(mail_send())
			{
				 echo "ok";
			}
			else
			{
				 echo "fault";
			}
      //echo "<script> alert('สมัครสมาชิกเสร็จสิ้น ในขณะนี้ระบบได้ส่งรหัสยืนยันในการสมัครสมาชิกเข้าไปในอีเมล์ของท่านเรียบร้อย กรุณานำรหัสดังกล่าวมายืนยันหลังจาก login เข้าสู่ระบบตามปกติ'); window.location.href='index.php'; </script>";
      mysqli_close($connect);
    }

?>
