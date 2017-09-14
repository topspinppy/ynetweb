<?php
  include("connect.php");
?>
<?php
  include("./template/doctype.php");
?>
<link rel="stylesheet" type="text/css" href="style/timeline.css">
<link rel="stylesheet" type="text/css" href="style/orgchart.css">

<style>
.box {
     display:none;
     position: absolute;
     top: 30px;
     left: 10px;
    background: orange;
    padding: 5px;
    border: 1px solid black;
}

a:hover + .box {
     display:block;
}
</style>
<body>
  <!-----HEADER------>
  <?php
    include("./template/header.php");
  ?>
  <!-----HEADER------>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">ผู้บริหาร</h1>
      <p class="lead">Acadamic</p>
    </div>
  </div>

  <div class="container">
        <div id="tps-org-chart">
      <figure class="clearfix">
          <ul>
              <li>
                <div class="hover_img">
                  <a href="#">
                    <span>
                      พชรพรรษ์ ประจวบลาภ<small>ประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร</small>

                    </span>
                  </a>
    <div class="box">Popup box</div>
                </div>
                <ul>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นางสาวกาญจนา วิจิตรบูรพา<small>รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร</small></span></a> </li>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นายรวิศุทธิ์ คณิตกุลเศรษฐ์<small>รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร</small></span></a></li>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นายณธีพัฒน์ อัครบวรสิทธิ์<small>รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร</small></span></a>  </li>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นายคีตพงศ์ นามวัฒน์<small>Director Student Information Systems</small></span></a></li>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นายปารณัท กลิ่นหอม<small>Director Project Management Office</small></span></a></li>
                      <li class="col-lg-2 tps-org-branch-end"><a href="#"><span>นายเพชรมงคล วัสสุวรรณ<small>Budget Accounting Technician</small></span></a></li>
                </ul>
              </li>

          </ul>

      </figure>
    </div>

	</div>
	<!-----FOOTER----->
  <?php
    include("./template/footer.php");
  ?>
	<!-----FOOTER----->
</body>
