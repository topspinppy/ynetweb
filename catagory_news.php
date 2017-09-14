<?php
  include("connect.php");
      error_reporting (E_ALL ^ E_NOTICE);
?>
<?php
  include("./template/doctype.php");
?>


<!-----------------comment Facebook ------------------>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9&appId=875084472630403";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-----------------comment Facebook ------------------>



  <body>
    <!-----HEADER------>
    <?php
      include("./template/header.php");
    ?>
    <!-----HEADER------>
    <!-----JUMBOTRON------>
    <div class="jumbotron" style="background-color:transparent !important; background-image:url('http://i.imgur.com/EinPKO3.jpg'); background-size: 100%; background-opacity:0.1;">
          <br>
          <br>
          <div class="container">
            <h1 style="color:white;"> ศูนย์ข่าวยุวทัศน์
            <?php
            $c_id = @$_GET["idtype"];
                if($c_id == "1") echo "| ข่าวประชาสัมพันธ์ </h1>";
                if($c_id == "2") echo "| ข่าวกิจกรรม </h1>";
                if($c_id == "3") echo "| ข่าวจัดซื้อจัดจ้าง </h1>";
            ?>
          </div>
    </div>
    <!-----JUMBOTRON------>
    <!-----NAVIGATION------>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> &nbsp; หน้าแรก</a>
            </li>
            <li class="active"><a href="catagory_news.php">ศูนย์ข่าวยุวทัศน์</a></li>
            <?php
            $c_id = @$_GET["idtype"];
                if($c_id == "1") echo "<li class='active'><a href='catagory_news.php'>ข่าวประชาสัมพันธ์</a></li>";
                if($c_id == "2") echo "<li class='active'>ข่าวกิจกรรม</li>";
                if($c_id == "3") echo "<li class='active'>ข่าวจัดซื้อจัดจ้าง</h1>";
            ?>
          </ol>
        </div>
      </div>
    </div>
    <!-----NAVIGATION------->
    <!-----รายละเอียดข่าว + widget----->
    <div class="container">
      <div class="row">
            <div class="col-lg-9">
            <?php
              $c_id = @$_GET["idtype"];
              include("pagination.php");
              mysqli_set_charset($connect,"utf8");
              $str = !empty($c_id)? "where id_type_news = '$c_id' and news_status = '0'" : " ";
              $sql = "SELECT * FROM news join type_news using (id_type_news)".$str;
              $query = page_query($connect,$sql, 4);
              while ($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
              {
            ?>
              <div class="rownews row">
                <div class="col-md-4">
                  <img src="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" class="img-responsive img-thumbnail">
                </div>
                <div class="col-md-8">
                  <div class="row-title">
                    <a href="news.php?id=<?php echo $result["id_news"]; ?>"><?php echo $result["head_news"]; ?></a>
                  </div>
                  <div class="type">
                    <span class="glyphicon glyphicon-tags"></span> ประเภทข่าว : <a href="catagory_news.php?idtype=<?php echo $result["id_type_news"]; ?>"><?php echo $result["name_type_news"]; ?></a>
                  </div>
                  <div class="row-excerpt">
                      <?php echo mb_substr(strip_tags($result["description_news"]), 0, 100, 'UTF-8') . '[..]'; ?>
                  </div>
                </div>
              </div>
            <?php
              }

              page_link_border("solid","1px","gray");
              echo "<br>";
              page_echo_pagenums(4,true);
              mysqli_close($connect);
            ?>

            </div>

            <!-----Widget----------->
            <div class="col-md-3">
                <div class="well">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> &nbsp;ศูนย์ข่าวยุวทัศน์</h4>
                  </div>
                  <div class="panel-body">
                    <table class="table table-condensed table-hover table_margin_link">
                        <tr>
                          <td>
                            <a href="catagory_news.php?idtype=3"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span> ข่าวจัดซื้อจัดจ้าง</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="catagory_news.php?idtype=2"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span> ข่าวกิจกรรม</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="catagory_news.php?idtype=1"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span> ข่าวประชาสัมพันธ์</a>
                          </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
          </div>
            <!-----widget----------->
      </div>
    </div>
    <!-----รายละเอียดข่าว + widget----->

    <!-----FOOTER----->
    <?php
      include("./template/footer.php");
    ?>
    <!-----FOOTER----->
  </body>
</html>
