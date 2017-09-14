<?php
  include("connect.php");
?>
<?php
  include("./template/doctype.php");
?>

<body>
  <!-----HEADER------>
  <?php
    include("./template/header.php");
  ?>
  <!-----HEADER------>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">ประวัติองค์กร</h1>
      <p class="lead">About us</p>
    </div>
  </div>

  <div class="container">
      
 <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">ประวัติองค์กร</a></li>
    </ul>
    <br>
    <br>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row">
        <div class="col-sm-6">
            <center><img src="http://file.siam2web.com/ynetbangkok/article/topic/201316_46839.jpg" width="346" height="241" class="img-responsive img-thumbnail"></center>
        </div>
        <div class="col-sm-6" style="line-height:10px;"><h4>เครือข่ายยุวทัศน์ กรุงเทพมหานคร (Youth Network of Bangkok) ก่อตั้งขึ้นเมื่อวันที่ 15 มิถุนายน 2554 จากกลุ่มแกนนำเยาวชนจิตอาสา ภายหลังจากการช่วยเหลือมหาอุทกภัย ดินโคลนถล่มช่วงต้นปี 2554 ในพื้นที่ภาคใต้ โดยมีกรอบแนวคิดในการช่วยเหลือและบรรเทาวิกฤติอุทกภัยด้วยแรงจิตอาสาของเด็กและเยาวชน</h4></div>
    </div>
    <div class="row">
        <div class="col-sm-6"><h4>ต่อมาเมื่อปลายปี พุทธศักราช 2554 เกิดวิกฤติมหาอุทกภัยในพื้นที่ภาคเหนือและภาคกลาง เครือข่ายยุวทัศน์ กรุงเทพมหานคร จึงมีบทบาทสำคัญอีกครั้งในการรวบรวมเหล่าเยาวชนอาสากลับมาทำงานและได้รวบรวมสิ่งของไปบริจาคในทุกพื้นที่ที่ประสบวิกฤติมหาอุทกภัย</h4></div>
        <div class="col-sm-6">            <center><img src="http://file.siam2web.com/ynetbangkok/article/topic/201316_46839.jpg" width="346" height="241" class="img-responsive img-thumbnail"></center></div>
    </div>
    <div class="row">
        <div class="col-sm-6"><center><img src="http://file.siam2web.com/ynetbangkok/article/topic/201382_66040.jpg" width="346" height="241" class="img-responsive img-thumbnail"></center></div>
        <div class="col-sm-6"><h4>ต่อมาต้นปี พุทธศักราช 2555 เครือข่ายยุวทัศน์ กรุงเทพมหานคร มีโอกาสเข้าร่วมโครงการประชุมเสวนางานด้านวัฒนธรรมต่าง ๆของกระทรวงวัฒนธรรม จึงมีบทบาทสำ�คัญในการร่วมส่งเสริมสนับสนุนงานทางวัฒนธรรม ทั้งด้านการเฝ้าระวัง และการเป็นแกนนำเยาวชนอาสาสมัครทางวัฒนธรรม และมีภารกิจสำคัญร่วมกับกระทรวงวัฒนธรรมคือการสนับสนุนจัดตั้งกองทุนพัฒนาสื่อปลอดภัยและสร้างสรรค์แห่งชาติ</h4></div>
    </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h3>Menu 1</h3>
        <p>Some content in menu 1.</p>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content in menu 2.</p>
      </div>
    </div>
    
  </div>
	<!-----FOOTER----->
  <?php
    include("./template/footer.php");
  ?>
	<!-----FOOTER----->
</body>
