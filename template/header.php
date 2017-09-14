<?php
session_start();
?>





<nav class="navbar navbar-default " role="navigation">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
		<span class="sr-only"> Toggle navigation </span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<?php
				$sqlname = "SELECT * FROM `components` WHERE `id`= '6'";
				$queryname = mysqli_query($connect,$sqlname) or die(mysqli_error($connect));
				$resultname = mysqli_fetch_array($queryname,MYSQLI_ASSOC);
		?>
		<a class="navbar-brand youth" href="index.php"><img href="index.php" src="./img/logo.png" class="img-responsive logo" height="40px" width="auto"><span class="ynethidden" style="position: absolute; margin-left:170px; margin-top:-10px;"><?php echo $resultname["data"]."<br><b>".$resultname["data2"]; ?> </b></span></a>
	</div>
	<div class="collapse navbar-collapse" id="main-navbar">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> หน้าแรก</a></li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			รู้จักเรา<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">ประวัติองค์กร</a></li>
				<li><a href="#" >คณะกรรมการ</a></li>
				<li><a href="#" >คณะผู้บริหาร</a></li>
				<li><a href="#">โครงสร้างองค์กร</a></li>
				<li><a href="#">รายงานประจำปี</a></li>
			</ul>

			</li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicons-conversation" aria-hidden="true"></span>ชุมชน <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li>
				<a href="#">เว็บบอร์ด</a>
				</li>
				<li>
				<a href="#">มัลติมีเดีย</a>
				</li>
				<li>
				<a href="#">สื่อมวลชนกับยุวทัศน์ (Press References)</a>
				</li>
				<li>
				<a href="#">วารสาร KIDSDEE</a>
				</li>
				<li>
				<a href="#">สาระน่ารู้</a>
				</li>
			</ul>

			</li>
			<li><a href="catagory_news.php">ข่าวสาร</a></li>
			<li><a href="#">โครงการ</a></li>
			<li class="dropdown">
      <?php
      if(isset($_SESSION["username"])=="")
      {
      ?>
			     <a class="dropdown-toggle" href="#signup" data-toggle="modal" data-target=".bs-example-modal-lg"> เข้าสู่ระบบ <span class="glyphicon glyphicon-log-in"></span> </a>
      <?php
      }
      else if (isset($_SESSION["username"]))
      {
      ?>
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["username"]; ?>
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="edit_profile.php"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูลส่วนตัว</a></li>
           <li><a href="#"><span class="glyphicon glyphicon-blackboard"></span> บล็อกส่วนตัว</a></li>
           <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> กระทู้ของฉัน</a></li>
           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ</a></li>
         </ul>
       </li>
      <?php
      }
      ?>
			</li>
		</ul>
	</div>
</div>
</nav>



<!-------------------------------------------LOGIN--------------------------------------------------------->

<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">เข้าสู่ระบบ</a></li>
              <li class=""><a href="#signup" data-toggle="tab">สมัครสมาชิก</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
        <p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>JoeSixPack@Sixpacksrus.com</a> for any other inquiries.</p>
        </div>
        <div class="tab-pane fade active in" id="signin">
          <form class="form-horizontal" method="post"  id="login-form">
           <fieldset>
		            <!-- Sign In Form -->
								<div id="error">
				        <!-- error will be shown here ! -->
				        </div>
		            <!-- Text input-->
		            <div class="control-group">
		              <label class="control-label" for="userid">ชื่อผู้ใช้ : </label>
		              <div class="controls">
		                <input required="" id="user_id" name="user_id" type="text" class="form-control" placeholder="กรอกชื่อผู้ใช้" class="input-medium" required="" >
		              </div>
		            </div>

		            <!-- Password input-->
		            <div class="control-group">
		              <label class="control-label" for="passwordinput">รหัสผ่าน : </label>
		              <div class="controls">
		                <input required="" id="password" name="password" class="form-control" type="password" placeholder="กรอกรหัสผ่าน" class="input-medium">
		              </div>
		            </div>
		            <!-- Multiple Checkboxes (inline) -->
		            <div class="control-group">
		              <label class="control-label" for="rememberme"></label>
		              <div class="controls">
		                <label class="checkbox inline" for="rememberme-0">
		                  <input type="checkbox" name="rememberme" id="rememberme-0" style="margin-left:-1px;" value="Remember me">
		                  &nbsp;&nbsp;&nbsp; เก็บข้อมูลไว้ในเครื่องนี้
		                </label>
		              </div>
		            </div>

		            <!-- Button -->
		            <div class="control-group">
		              <label class="control-label" for="signin"></label>
		              <div class="controls">
										<button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
										 		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
										</button>
		              </div>
		            </div>
		            </fieldset>
            </form>
            <hr>
            <?php
              include("fblogin.php");
              showloginfb($loginUrl);
           ?>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" name="formregis" method="post" action="confirm_regis.php">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">ชื่อผู้ใช้ :</label>
              <div class="form-controls">
                <input id="username" name="username" class="form-control" type="text" placeholder="กรุณากรอกชื่อผู้ใช้" class="input-large" required=""  onBlur="checkText(this.value);" >
                <span class='glyphicon form-control-feedback' aria-hidden='true'></span>
              </div>
            </div>

            <!-- Passwords input-->
            <div class="control-group">
              <label class="control-label" for="">รหัสผ่าน:</label>
              <div class="controls">
                <input id="" name="password" class="form-control" type="password" placeholder="กรุณากรอกรหัสผ่าน" class="input-large" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">ยืนยันรหัสผ่าน:</label>
              <div class="controls">
                <input id="text" name="password2" class="form-control" type="password" placeholder="กรุณาใส่รหัสผ่านซ้ำอีกครั้ง" class="input-large" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">อีเมล์:</label>
              <div class="controls">
                <input id="email" name="emails" class="form-control" type="email" placeholder="กรุณากรอกอีเมล์" class="input-large" required="" >
              </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">ชื่อ - นามสกุล :</label>
              <div class="controls">
                <input id="namesurname" class="form-control" name="namesurname" type="text" placeholder="กรุณากรอกชื่อ-นามสกุล" class="input-large" required="">
              </div>
            </div>
            <br>
            <center>
            <?php
              include("AntiBotCaptcha/abcaptcha.php");
              captcha_text_length(8);
              echo "<center>".captcha_echo()."</center>";
            ?>
            </center>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword"></label>
              <div class="controls">
                <input id="namesurname" class="form-control" name="captchaz" type="text" placeholder="กรอกอักขระในภาพ" class="input-large" required="">
              </div>
              <input type="checkbox" name="accept" id="rememberme-0" style="margin-left:-1px;" value="Remember me" required>
              ยอมรับเงื่อนไขของเว็บไซต์
            </div>
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button type="submit" id="confirmsignup" name="confirmsignup" class="btn btn-success">สมัครสมาชิก</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
     <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
