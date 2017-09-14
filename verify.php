<style>
@import url('https://fonts.googleapis.com/css?family=Kanit');
</style>
<?php include("connect.php") ?>

<?php
  $verify = $_GET["idverify"];

  $sql = "SELECT * from member WHERE verify = '$verify'";
  $b = mysqli_query($connect, $sql);
  $datae = mysqli_fetch_array($b,MYSQLI_ASSOC);

  $veri = $datae["verify"];
  if($veri != 0)
  {
    $sql = "UPDATE member SET verify = '0' WHERE verify = '$verify'";
    $a = mysqli_query($connect, $sql);
?>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<style>
html{
  font-family: 'Kanit', sans-serif;
}
.wrapper {
  width: 100px;
  margin: 4em auto 0;
}

.checkmark {
  stroke: green;
  stroke-dashoffset: 745.74853515625;
  stroke-dasharray: 745.74853515625;
  animation: dash 2s ease-out forwards infinite;
}

@keyframes dash {
  0% {
    stroke-dashoffset: 745.74853515625;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
</style>

<div class="wrapper">
  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve">
  <path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4
	C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3"/>
</svg>

</div>

<h1 style="font-family: 'Kanit', sans-serif;"><center style="font-family: 'Kanit', sans-serif;">ยืนยันสมัครสมาชิกเรียบร้อย ท่านสามารถเข้าสู่ระบบได้ตามปกติ</center></h1>
<?php
}
else {
?>
<meta charset="utf-8">
<style>
html{
  font-family: 'Kanit', sans-serif;
}
.cross__svg {
  border-radius: 50%;
  display: block;
  height: 154px;
  margin: 4rem auto;
  stroke-width: 3;
  width: 154px;
}

.cross__circle {
  animation: 0.6s ease 0s normal forwards 1 running stroke;
  fill: none;
  margin: 0 auto;
  stroke: #e55454;
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
}

.cross__path {
  stroke: #e55454;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  transform-origin: 50% 50% 0;
}
.cross__path--right {
  animation: 0.3s ease 0.8s normal forwards 1 running stroke;
}
.cross__path--left {
  animation: 1s ease 0.8s normal forwards 1 running stroke;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}

</style>

<svg class="cross__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
  				<circle class="cross__circle" cx="26" cy="26" r="25" fill="none"/>
				  <path class="cross__path cross__path--right" fill="none" d="M16,16 l20,20" />
  <path class="cross__path cross__path--right" fill="none" d="M16,36 l20,-20" />
			</svg>
<h1 style="font-family: 'Kanit', sans-serif;"><center>ท่านสมัครสมาชิกไปเรียบร้อยแล้ว หรือไม่มีการยืนยันในระบบ</center></h1>
<?php
};
?>
