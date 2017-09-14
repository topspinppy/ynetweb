<?php
mysqli_set_charset($connect,"utf8");
$sql = "SELECT * FROM components WHERE id = '1'";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

$result["status"];
$display = "";
if($result["status"] == 0)
{
   $display = "block";
}
else
{
   $display = "none";
}
?>


<section class="news_public" style="background-color: #F5F5F5; padding-bottom: 40px; display:<?php echo $display; ?>;">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
          <ul class="nav nav-tabs" style="margin-top: 10px;  border-width: 4px; border-color: #ff7200;">
            <li class="active">
                <a data-toggle="tab" href="#home"  style="background-color: #ff7200;">
                    <font size=4px color="white">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp; ข่าวกิจกรรม
                    </font>
                </a>
            </li>
          </ul>
          <?php
          mysqli_set_charset($connect,"utf8");
          $sql = "SELECT * FROM news where id_type_news = '2' and news_status = '0' order by id_news desc LIMIT 0,3";
          $query = mysqli_query($connect,$sql);
          while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
          {
          ?>
          <div class="tab-content" >
            <div id="home" class="tab-pane fade in active" >
                <div class="col-md-4">
                  <div class="newspub1">
                    <div class="picnews">
                      <center>
                        <img class="img-responsive " src="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" width="255px" height="169px">
                      </center>
                    </div>
                    <div class="datenews">
                      <?php $date = $result["dates"]; echo substr(str_replace("-","/",$date),0,11); ?>
                    </div>
                    <div class="titlenews">
                       <a href="news.php?id=<?php echo $result["id_news"]; ?>"> <?php echo $result["head_news"]; ?></a>
                    </div>
                    <div class="short_news">
                       <?php $id=$result["id_news"]; echo mb_substr(strip_tags($result["description_news"]), 0, 100, 'UTF-8');?> <a href="news.php?id=<?php echo $id; ?>">..อ่านต่อ</a>
                    </div>
                  </div>
                </div>


            </div>
            <?php
            }
            ?>
          </div>
              </div>
        </div>
            
    </div>
        
     <div class="col-sm-4" style="margin-top:50px;">
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fynetbangkok%2F&tabs=timeline&width=340&height=346&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=461443944229849" width="340" height="346" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
     </div>
    </section>
