<?php
mysqli_set_charset($connect,"utf8");
$sql1 = "SELECT * FROM components WHERE id = '2'";
$query1 = mysqli_query($connect,$sql1);
$result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);
$display1 = "";
if($result1["status"] == 0)
{
   $display1 = "block";
}
else
{
   $display1 = "none";
}
?>
<?php
$sql2 = "SELECT * FROM components WHERE id = '3'";
$query2 = mysqli_query($connect,$sql2);
$result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
$display2 = "";
if($result2["status"] == 0)
{
   $display2 = "block";
}
else
{
   $display2 = "none";
}
?>

<?php
$displayagain = '';
$sql3 = "SELECT * FROM components WHERE id = '4'";
$query3 = mysqli_query($connect,$sql3);
$result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC);
$display3 = "";
if($result3["status"] == 0)
{
   $display3 = "block";
}
else
{
   $display3 = "none";
}

if($display1 == "none" && $display2 == "none" && $display3 == "none")
{
   $displayagain = "none";
}
else {
   $displayagain = "block";
}
?>

<section class="sect_news_links">
    <div class="container" style="margin-top:20px;">
      <div class="col-md-9">
          <ul class="nav nav-tabs" style="border-color: #ff003b; border-width: 4px;">
            <li class="active"><a data-toggle="tab" href="#news" style="background-color: #ff003b; display:<?php echo $display1; ?>;"><font size=4px color="white"> <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> ข่าวประกาศ</font></a></li>
            <li><a data-toggle="tab" href="#menu1" style="background-color: #ff517a; display:<?php echo $display2; ?>;"><font size=4px color="white"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ข่าวจัดซื้อจัดจ้าง</font></a></li>
            <li><a data-toggle="tab" href="#download" style="background-color: #ff517a; display:<?php echo $display3; ?>;"><font size=4px color="white"> <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ข่าวจากสื่อ</font></a></li>
          </ul>

          <div class="tab-content" style="border:1px; display:<?php echo $displayagain; ?>;">
            <div id="news" class="tab-pane fade in active publicreletions">
              <?php
              mysqli_set_charset($connect,"utf8");
              $sql = "SELECT * FROM news where id_type_news = '1' and news_status = '0' order by id_news desc LIMIT 0,4";
              $query = mysqli_query($connect,$sql);
              while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
              {
              ?>
              <div class="rownews row">
                <div class="col-md-4">
                  <img src="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" width="230px" height="141px" class="img-responsive img-thumbnail">
                </div>
                <div class="col-md-8">
                  <div class="row-title">
                    <a href="news.php?id=<?php echo $result["id_news"]; ?>"><?php echo $result["head_news"]; ?></a>
                  </div>
                  <div class="row-excerpt">
                      <?php echo mb_substr(strip_tags($result["description_news"]), 0, 141, 'UTF-8') . '[..]'; ?>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
               <a href="catagory_news.php?idtype=1"><button type="button" style="position: absolute; right:20px; margin-bottom: 2px;" class="btn btn-default btn-sm">อ่านเพิ่มเติม</button></a>
               <br>
            </div>
            <div id="menu1" class="tab-pane fade ">
              <?php
              mysqli_set_charset($connect,"utf8");
              $sql = "SELECT * FROM news where id_type_news = '3' and news_status = '0' order by id_news desc LIMIT 0,4";
              $query = mysqli_query($connect,$sql);
              while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
              {
              ?>
              <div class="rownews row">
                <div class="col-md-4">
                  <img src="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" width="230px" height="141px" class="img-responsive img-thumbnail" data-lightbox="image-1" data-title="">
                </div>
                <div class="col-md-8">
                  <div class="row-title">
                    <a href="news.php?id=<?php echo $result["id_news"]; ?>"><?php echo $result["head_news"]; ?></a>
                  </div>
                  <div class="row-excerpt">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation
                  </div>
                </div>
              </div>
              <?php
              }
              ?>


               <button type="button" style="position: absolute; right:20px; margin-bottom: 2px;" class="btn btn-default btn-sm">อ่านเพิ่มเติม</button>
               <br>
               <br>
              </div>
            <div id="download" class="tab-pane fade ">
            <table class="table table-striped table-hover">
                <tbody>
                  <tr>
                    <?php
                    mysqli_set_charset($connect,"utf8");
                    $sql = "SELECT * FROM news where id_type_news = '4' and news_status = '0' order by id_news desc LIMIT 0,4";
                    $query = mysqli_query($connect,$sql);
                    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                    {
                    ?>
                      <td><span class="glyphicon glyphicon-record" aria-hidden="true"></span></td>
                      <td><a href="<?php echo $result["description_news"]?>"> <?php echo $result["head_news"];?></a></td>
                      <td><?php echo substr($result["dates"],0,10);?></td>
                    <?php
                    }
                    ?>
                  </tr>
                </tbody>
              </table>
              <button type="button" style="position: absolute; right:20px; margin-bottom: 2px;" class="btn btn-default btn-sm">อ่านเพิ่มเติม</button>
                </div>


      </div>
      </div>
      <div class="col-md-3">
        <div class=" panel panel-info">
                <div class="panel-heading "> <font size=4px color="white"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> &nbsp;ยุวทัศน์ LINKS</div></font>
                      <div class="panel-body">
                        <table class="table table-condensed table-hover table_margin_link">
                        <tbody>
                          <tr>
                             <td><a href="http://www.m-culture.go.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria- hidden="true"></span>&nbsp;กระทรวงวัฒนธรรม</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.moph.go.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;กระทรวงสาธารณสุข</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.mediafund.or.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;กองทุนพัฒนาสื่อปลอดภัยและสร้างสรรค์</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.thaihealth.or.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;สำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.moralcenter.or.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;ศูนย์คุณธรรม (องค์การมหาชน)</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.ashthailand.or.th"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;มูลนิธิรณรงค์เพื่อการไม่สูบบุหรี่</a></td>
                          </tr>
                          <tr>
                              <td><a href="http://www.thainhf.org"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>&nbsp;มูลนิธิสาธารณสุขแห่งชาติ</a></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
          </div>
        </div>
      </div>
    </div>
  </section>
