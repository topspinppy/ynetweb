<?php
  include("connect.php");
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
    <?php
      $id = $_GET["id"];
    ?>
    <!-----HEADER------>
    <?php
      include("./template/header.php");
    ?>
    <!-----HEADER------>
    <!-----JUMBOTRON------>
    <div class="jumbotron" style="background-color:transparent !important; background-image:url('img/prism.jpg'); background-size: 100%; background-opacity:0.1;">
          <br>
          <br>
          <div class="container">
            <?php
              mysqli_set_charset($connect,"utf8");
              $sql = "SELECT * FROM news where id_news = '$id'";
              $query = mysqli_query($connect,$sql);
              $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

              if($result["id_type_news"] == "1") echo "<h1 style='color:white;'>ข่าวประชาสัมพันธ์ | Public Reletions News</h1>";
              if($result["id_type_news"] == "2") echo "<h1 style='color:white;'>ข่าวกิจกรรม | Activities News</h1>";
              if($result["id_type_news"] == "3") echo "<h1 style='color:white;'>ข่าวจัดซื้อจัดจ้าง | Procurement News</h1>";

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
                if($result["id_type_news"] == "1") echo "<li class='active'><a href='catagory_news.php?idtype=1'>ข่าวประชาสัมพันธ์</a></li>";
                if($result["id_type_news"] == "2") echo "<li class='active'><a href='catagory_news.php?idtype=2'>ข่าวกิจกรรม</a></li>";
                if($result["id_type_news"] == "3") echo "<li class='active'><a href='catagory_news.php?idtype=3'>ข่าวจัดซื้อจัดจ้าง</h1>";
            ?>
            <li class="active">
              <?php
              mysqli_set_charset($connect,"utf8");
              $sql = "SELECT * FROM news where id_news = '$id'";
              $query = mysqli_query($connect,$sql);
              $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
              echo $result["head_news"];
              ?>
            </li>

          </ol>
        </div>
      </div>
    </div>
    <!-----NAVIGATION------->
    <!-----รายละเอียดข่าว + widget----->
    <div class="container">
      <div class="row">
            <div class="col-lg-9">
                <h1>
                  <?php echo $result["head_news"]; ?>
                </h1>
                <p style="margin-top:0px;">
                  <span class="glyphicon glyphicon-time"></span> by <a href="#"><?php echo $result["admin_name"]; ?> | </a> Posted on <?php echo $result["dates"]; ?>
                </p>
                <hr>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-596b65cd5c70ea6c"></script>
                <div class="addthis_inline_share_toolbox"></div>
                <hr>
                <center>
                   <a href="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" data-lightbox="image-1" data-title="<?php echo $result["head_news"]; ?>"><img class="img-responsive" src="dashboard/pages/news/imgnews/<?php echo $result["images"]; ?>" alt=""></a>
                </center>
                <hr>
                <?php
                  echo $result["description_news"];
                ?>
                <hr>
                <div class="well">
                    <div class="fb-comments" data-href="http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" data-width="724" data-numposts="5" data-mobile="true"></div>
                </div>
                <hr>
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
                <!-- <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->
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
