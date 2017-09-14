<?php include('../../connect.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="error"></div>

<?php
if(isset($_POST['save_edit_news']))
{
  $news = '';
  $newsz = '';
  $count = 0;
  $news_title = trim($_POST["news_title"]);
  $news_type = trim($_POST["news_type"]);
  $news_detail = trim($_POST["news_detail"]);
  $news_status = trim($_POST["news_status"]);
  $imgs = trim($_POST["img_news_files"]);
  $img = $_FILES['img_news_file']['name'];
  $id = $_POST["id_news"];
  $sqlz = "SELECT * from news join type_news using (id_type_news) where id_news = '$id'";
  $queryd= mysqli_query($connect,$sqlz) or die(mysqli_error($connect));
  $resultnews = mysqli_fetch_array($queryd,MYSQLI_ASSOC);
  if($news_title == $resultnews["head_news"])
  {
      $news = '';
  }
  else
  {
      $news = "head_news = '$news_title',";
      $count++;
  }
  if($news_type == $resultnews["id_type_news"])
  {
      $news .= '';
  }
  else
  {
      $news .= "id_type_news = '$news_type',";
      $count++;
  }
  if($news_detail == $resultnews["description_news"])
  {
      $news .= '';
  }
  else
  {
      $news .= "description_news = '$news_detail',";
      $count++;
  }
  if($news_status == $resultnews["news_status"])
  {
      $news .= '';
  }
  else
  {
      $news .= "news_status = '$news_status',";
      $count++;
  }
  if(empty($img))
  {
      $news .= null;
  }
  else
  {
      move_uploaded_file($_FILES["img_news_file"]["tmp_name"],"news/imgnews/".$_FILES["img_news_file"]["name"]);
      $news .= "images = '$img' ,";
      $count++;
  }
  if($news != '')
  {
      $countnews = strlen($news);
      $newsz = substr_replace($news,"",$countnews-1);
      $SQL = "UPDATE news SET $newsz WHERE id_news = '$id' ";
      $objQuery = mysqli_query($connect,$SQL) or die (mysqli_error($connect));
      $alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลข่าวประชาสัมพันธ์ สำเร็จ</div>';
  }
  else
  {
      $alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>กรุณาเปลี่ยนแปลงข้อมูลเพื่อแก้ไข ข่าวประชาสัมพันธ์</div>';
  }
}
  echo @$alert;
?>
    <div class="panel panel-green">
        <div class="panel-heading">
            ข่าวประชาสัมพันธ์ทั้งหมด<span class="pull-right btn_top_right"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#insert_news"><i class="fa fa-plus fa-fw"></i> เพิ่มข่าวใหม่</button></span>
        </div>
        <div style="margin-left:8px; margin-top:8px; margin-bottom:8px;">
          <form name="form1" method="post" class="form-inline">
             ค้นหาข่าวตามประเภท
             <select name="typenews" onchange="this.form.submit()" class="form-control">
                <option value="0">ข่าวทั้งหมด</option>
              <?php
                $sqlt = "SELECT * from type_news";
                $querye = mysqli_query($connect,$sqlt) or die(mysqli_error($connect));
                while($result = mysqli_fetch_array($querye,MYSQLI_ASSOC))
                {
              ?>
                  <option value="<?php echo $result["id_type_news"]; ?>" <?php if(@$_POST["typenews"]==$result["id_type_news"]){echo"selected";}?>><?php echo $result["name_type_news"]; ?></option>
              <?php
                }
              ?>
            </select>
        </form>
        </div>

        <div class="table-responsive">
            <table width="100%" border="0" class="table table-bordered">
               <thead class="table_header" bgcolor="#2F4F4F">
                  <tr class="table_header">
                     <td width="11%"><font color="#FFFFFF">วันที่</td>
                     <td width="11%"><font color="#FFFFFF">ประเภทข่าว</td>
                     <td width="20%"><font color="#FFFFFF">หัวข้อข่าว</td>
                     <td width="39%"><font color="#FFFFFF">รายละเอียด</td>
                     <td width="22%"><font color="#FFFFFF">จัดการ</td>
                  </tr>
               </thead>
                <tbody>
                  <?php
                      $a = @$_POST["typenews"];
                      $s = 0;
                      $str = !empty($a)? "where id_type_news = $a " : " ";
                      $sqls = "SELECT * FROM news join type_news using (id_type_news) $str";
                      $query = mysqli_query($connect,$sqls) or die(mysqli_error($connect));
                      while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
                      {
                           $s = $result["id_news"];
                  ?>
                  <tr>
                      <td align="center">
                             <?php echo $result["dates"]; ?>
                      </td>
                      <td align="center">
                             <?php echo $result["name_type_news"]; ?>
                      </td>
                      <td>
                             <?php echo $result["head_news"]; ?>
                      </td>
                      <td>
                             <?php echo mb_substr($result["description_news"],0, 50 , 'UTF-8'); ?>
                      </td>
                      <td align="right">
                          <?php
                              if($result["news_status"] == '0')
                              {
                               		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.$result["id_news"].'" onClick="javascript:changeNewsStatus(\''.$result["id_news"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$result["id_news"].'"></i> <span id="text-'.$result["id_news"].'">'.'แสดง'.'</span></button>';
                              }
                              else
                              {
                               		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$result["id_news"].'" onClick="javascript:changeNewsStatus(\''.$result["id_news"].'\',\'th\');"><i class="fa fa-lock" id="icon-'.$result["id_news"].'"></i> <span id="text-'.$result["id_news"].'">'.'ซ่อน'.'</span></button>';
                              }
                           ?>
                           <a class="btn btn-info btn-xs" id="edit" style="color:#FFF;" data-toggle="modal" data-target="#edit_news" data-whatever="<?php echo $result["id_news"]; ?>">
                                  <i class="fa fa-edit"></i> แก้ไข
                           </a>
                           <button type="button" class="btn btn-danger btn-xs" onClick="javascript:deleteNews('<?php echo $result["id_news"];?>'); window.location.reload();">
                                  <i class="glyphicon glyphicon-remove"></i> ลบ
                           </button>
                       </td>
                   </tr>
                   <?php
                       }
                   ?>
                </tbody>
              </table>
          </div>
      </div>



      <!--MODEL เพิ่มข่าวใหม่ ----------------------------------------------------------->
      <div id="insert_news" class="modal fade" role="dialog">
          <form  method="post" enctype="multipart/form-data" id="formaddnews" name="formaddnews">

                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  <h4 class="modal-title" id="myModalLabel">เพิ่มข่าวใหม่</h4>
                                              </div>
                                              <div class="modal-body">

                                                <div class="form-group">
                                                  <label for="news_title">หัวข้อข่าว</label>
                                                  <input type="text" name="news_title" id="news_title" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                  <label for="news_title">ประเภทข่าว</label>
                                                  <select name="news_type" id="news_type" class="form-control">
                                                    <?php
                                                      $sqlt = "SELECT * from type_news";
                                                      $querye = mysqli_query($connect,$sqlt) or die(mysqli_error($connect));
                                                      while($result = mysqli_fetch_array($querye,MYSQLI_ASSOC))
                                                      {
                                                    ?>
                                                        <option value="<?php echo $result["id_type_news"]; ?>" <?php if(@$_POST["typenews"]==$result["id_type_news"]){echo"selected";}?>><?php echo $result["name_type_news"]; ?></option>
                                                    <?php
                                                      }
                                                    ?>
                                                  </select>
                                                </div>
      											                    <div class="form-group">
      											                      <label for="news_detail">รายละเอียดข่าว</label>
                                                  <textarea name="news_detail" id="news_detail" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                   <label for="img_news_file">รูปประกอบข่าว </label>
                                                   <input type="file" name="img_news_file" id="img_news_file" class="form-control">
                                                </div>
                                                 <div class="form-group">
                                                   <label for="news_status">สถานะ</label>
                                                   <select name="news_status" id="news_status" class="form-control">
                                                     <option value="0" selected="selected">แสดง</option>
                                                     <option value="1">ซ่อน</option>
                                                   </select>
                                                </div>

                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> ปิด</button>
                                                  <button type="submit" name="save_news" class="btn btn-primary btn-sm" ><i class="fa fa-save fa-fw"></i> บันทึก</button>
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                      </form>
                                      <!-- /.modal-dialog -->
                                  </div>
      <!--MODEL เพิ่มข่าวใหม่ ----------------------------------------------------------->

      <!--MODEL แก้ไขข่าวใหม่ ----------------------------------------------------------->
      <div id="edit_news" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
          <form id="formeditnews" name="formeditnews" enctype="multipart/form-data" method="post">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  <h4 class="modal-title" id="myModalLabel">แก้ไขข่าว</h4>
                                              </div>
                                              <div class="r">


                                              </div>
                                          </div>
                                      </div>
            </form>
        </div>
      <!--MODEL แก้ไขข่าวใหม่ ----------------------------------------------------------->


  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

  <script type="text/javascript" src="../../js/bootstrap.js"></script>-->

<script>
  function changeNewsStatus(prokey,lang){
  	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  	 	xmlhttp=new XMLHttpRequest();
  	}else{// code for IE6, IE5
    		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	var es = document.getElementById('btn-'+prokey);
  	if(es.className == 'btn btn-success btn-xs'){
  		var sts= 0;
  	}else{
  		var sts= 1;
  	}
  	xmlhttp.onreadystatechange=function(){
    		if (xmlhttp.readyState==4 && xmlhttp.status==200){

  			if(es.className == 'btn btn-success btn-xs'){
  				document.getElementById('btn-'+prokey).className = 'btn btn-danger btn-xs';
  				document.getElementById('icon-'+prokey).className = 'fa fa-lock';
  				if(lang == 'en'){
  					document.getElementById('text-'+prokey).innerHTML = 'Hide';
  				}else{
  					document.getElementById('text-'+prokey).innerHTML = 'ซ่อน';
  				}

  			}else{
  				document.getElementById('btn-'+prokey).className = 'btn btn-success btn-xs';
  				document.getElementById('icon-'+prokey).className = 'fa fa-unlock-alt';
  				if(lang == 'en'){
  					document.getElementById('text-'+prokey).innerHTML = 'Show';
  				}else{
  					document.getElementById('text-'+prokey).innerHTML = 'แสดง';
  				}

  			}
    		}
  	}

  	xmlhttp.open("GET","news/change_news_status.php?news="+prokey+"&sts="+sts,true);
  	xmlhttp.send();
  }



  $(document).ready(function () {

    $('#edit_news').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'key=' + recipient;

              $.ajax({
                  async: true,
                  type: "GET",
                  url: "news/editnews.php",
                  data: dataString,
                  cache: false,
                  success: function (data) {
                      modal.find('.r').html(data);
                  },
                  error: function(err) {
                      console.log(err);
                  }
              });
      })

      $('#formaddnews').submit(function(evt)
      {
            evt.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                  async: true,
                  url: 'news/addnews.php',
                  type: 'POST',
                  data: formData,
                  async: false,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success :  function(response)
                  {
                      if(response.trim()=="0")
                      {
                           $("#insert_news").modal('toggle');
                          //  $('.modal-backdrop').hide();
                           $("#error").fadeIn(1000, function()
                           {
                                    $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; เพิ่มข่าวสารเรียบร้อยแล้ว ! !</div>');
                           });
                      }
                      else
                      {
                           $("#insert_news").modal('toggle');
                          //  $('.modal-backdrop').hide();
                           $("#error").fadeIn(1000, function()
                           {
                                     $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ผิดพลาด ! !</div>');
                           });
                      }
                   }
            });
      });
  });


  function deleteNews(slidekey)
  {
    if(confirm("ต้องการจะลบข่าวประชาสัมพันธ์นี้ใช่หรือไม่ ?"))
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            document.getElementById(slidekey).innerHTML = '';
          }
        }
          xmlhttp.open("GET","news/deletenews.php?type=delete_news&key="+slidekey,true);
          xmlhttp.send();
          window.location.reload();
      }
  }
  </script>
