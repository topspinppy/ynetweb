<div id="error"></div>

        <div class="panel panel-yellow">
                <div class="panel-heading">
                    ข้อมูลทั่วไป
                </div>
               <form enctype="multipart/form-data" id="editabout" name="editabout">
                <div class="panel-body">
                  <?php
              				$sqlname = "SELECT * FROM `components` WHERE `id`= '6'";
              				$queryname = mysqli_query($connect,$sqlname) or die(mysqli_error($connect));
              				$resultname = mysqli_fetch_array($queryname,MYSQLI_ASSOC);
              		?>
                  <table width="100%" border="0">
                      <tbody>
                        <tr>
                          <td width="31%">ชื่อเว็บไซต์</td>
                          <td width="69%">
                            <div class="form-group">
                              <input type="text" name="name_website" id="name_website" value="<?php echo $resultname["data"]; ?>" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="31%">ชื่อเว็บไซต์ภาษาอังกฤษ</td>
                          <td width="69%">
                            <div class="form-group">
                              <input type="text" name="name_website_eng" id="name_website_eng" value="<?php echo $resultname["data2"]; ?>" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Favicon</td>
                          <td>
                            <?php
                                $sqlfavicon = "SELECT * FROM `components` WHERE `id`= '7'";
                                $queryfavicon = mysqli_query($connect,$sqlfavicon) or die(mysqli_error($connect));
                                $resultfavicon = mysqli_fetch_array($queryfavicon,MYSQLI_ASSOC);
                            ?>
                            <img src="../../img/favicon/<?php echo $resultfavicon["data"];?>" width="32" height="32" alt=""><br><br>
                            <div class="form-group">
                              <input type="file" name="site_favicon" id="site_favicon" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <?php
                            $sqlactivity = "SELECT * FROM `components` WHERE `id`= '1'";
                            $queryactivity = mysqli_query($connect,$sqlactivity) or die(mysqli_error($connect));
                            $resultactivity = mysqli_fetch_array($queryactivity,MYSQLI_ASSOC);
                        ?>
                        <tr>
                          <td>เปิด/ปิดเมนูข่าวกิจกรรม</td>
                          <td>
                            <div class="form-group" style="margin:6px;">
                              <?php
                                  if($resultactivity["status"] == '0')
                                  {
                                        echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.$resultactivity["id"].'" onClick="javascript:changeactivityStatus(\''.$resultactivity["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultactivity["id"].'"></i> <span id="text-'.$resultactivity["id"].'">แสดง</span></button>';
                                  }
                                  else
                                  {
                                        echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$resultactivity["id"].'" onClick="javascript:changeactivityStatus(\''.$resultactivity["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultactivity["id"].'"></i> <span id="text-'.$resultactivity["id"].'">ซ่อน</span></button>';
                                  }
                               ?>
                            </div>
                          </td>
                        </tr>
                        <?php
                            $sqlpr = "SELECT * FROM `components` WHERE `id`= '2'";
                            $querypr = mysqli_query($connect,$sqlpr) or die(mysqli_error($connect));
                            $resultpr = mysqli_fetch_array($querypr,MYSQLI_ASSOC);
                        ?>
                        <tr>
                          <td>เปิด/ปิดเมนูข่าวประชาสัมพันธ์</td>
                          <td>
                            <div class="form-group" style="margin:6px;">
                              <?php
                                  if($resultpr["status"] == '0')
                                  {
                                        echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.$resultpr["id"].'" onClick="javascript:changeprStatus(\''.$resultpr["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultpr["id"].'"></i> <span id="text-'.$resultpr["id"].'">แสดง</span></button>';
                                  }
                                  else
                                  {
                                        echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$resultpr["id"].'" onClick="javascript:changeprStatus(\''.$resultpr["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultpr["id"].'"></i> <span id="text-'.$resultpr["id"].'">ซ่อน</span></button>';
                                  }
                               ?>
                          </td>
                        </tr>
                        <?php
                            $sqlauction = "SELECT * FROM `components` WHERE `id`= '3'";
                            $queryauction = mysqli_query($connect,$sqlauction) or die(mysqli_error($connect));
                            $resultauction = mysqli_fetch_array($queryauction,MYSQLI_ASSOC);
                        ?>
                        <tr>
                          <td>เปิด/ปิดเมนูข่าวจัดซื้อจัดจ้าง</td>
                          <td>
                            <div class="form-group" style="margin:6px;">
                              <?php
                                  if($resultauction["status"] == '0')
                                  {
                                        echo '<button type="button" class="btn btn-success btn-xs " id="btn-'.$resultauction["id"].'" onClick="javascript:changeauctionStatus(\''.$resultauction["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultauction["id"].'"></i> <span id="text-'.$resultauction["id"].'">แสดง</span></button>';
                                  }
                                  else
                                  {
                                        echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$resultauction["id"].'" onClick="javascript:changeauctionStatus(\''.$resultauction["id"].'\',\'th\');"><i class="fa fa-lock" id="icon-'.$resultauction["id"].'"></i> <span id="text-'.$resultauction["id"].'">ซ่อน</span></button>';
                                  }
                               ?>
                            </div>
                          </td>
                        </tr>
                        <?php
                            $sqldownload = "SELECT * FROM `components` WHERE `id`= '4'";
                            $querydownload = mysqli_query($connect,$sqldownload) or die(mysqli_error($connect));
                            $resultdownload = mysqli_fetch_array($querydownload,MYSQLI_ASSOC);
                        ?>
                        <tr>
                          <td>เปิด/ปิดเมนูดาวน์โหลดเอกสาร</td>
                          <td>
                            <div class="form-group" style="margin:6px;">
                              <?php
                                  if($resultdownload["status"] == '0')
                                  {
                                        echo '<button type="button" class="btn btn-success btn-xs " id="btn-'.$resultdownload["id"].'" onClick="javascript:changeauctionStatus(\''.$resultdownload["id"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$resultdownload["id"].'"></i> <span id="text-'.$resultdownload["id"].'">แสดง</span></button>';
                                  }
                                  else
                                  {
                                        echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$resultdownload["id"].'" onClick="javascript:changeauctionStatus(\''.$resultdownload["id"].'\',\'th\');"><i class="fa fa-lock" id="icon-'.$resultdownload["id"].'"></i> <span id="text-'.$resultdownload["id"].'">ซ่อน</span></button>';
                                  }
                               ?>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                       <button type="submit" class="btn btn-warning btn-sm">
                         <i class="fa fa-save fa-fw"></i>
                         บันทึก
                       </button>
                </div>
                </form>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#editabout").submit(function(e) {
          e.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
              url: "config/save_managewebpage.php",
              type: 'POST',
              data: formData,
              async: false,
              cache: false,
              contentType: false,
              processData: false,
              success: function (data)
              {
                  if(data.trim()=="0")
                  {
                       $("#error").fadeIn(1000, function()
                       {
                                $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; แก้ไขเรียบร้อย !</div>');
                       });
                  }
              }
        });
    });
</script>
<script type="text/javascript">
    function changeactivityStatus(prokey,lang){
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    	 	xmlhttp=new XMLHttpRequest();
    	}else{// code for IE6, IE5
      		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	var es = document.getElementById('btn-'+prokey);
    	if(es.className == 'btn btn-success btn-xs'){
    		var sts= 1;
    	}else{
    		var sts= 0;
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

      xmlhttp.open("GET","config/changecomponent.php?id="+prokey+"&sts="+sts+"&about=activity",true);
      xmlhttp.send();
    }

    function changeprStatus(prokey,lang){
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }else{// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      var es = document.getElementById('btn-'+prokey);
      if(es.className == 'btn btn-success btn-xs'){
        var sts= 1;
      }else{
        var sts= 0;
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

      xmlhttp.open("GET","config/changecomponent.php?id="+prokey+"&sts="+sts+"&about=publicrelations",true);
      xmlhttp.send();
    }

    function changeauctionStatus(prokey,lang){
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }else{// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      var es = document.getElementById('btn-'+prokey);
      if(es.className == 'btn btn-success btn-xs'){
        var sts= 1;
      }else{
        var sts= 0;
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

      xmlhttp.open("GET","config/changecomponent.php?id="+prokey+"&sts="+sts+"&about=auction",true);
      xmlhttp.send();
    }

    function changedownloadStatus(prokey,lang){
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }else{// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      var es = document.getElementById('btn-'+prokey);
      if(es.className == 'btn btn-success btn-xs'){
        var sts= 1;
      }else{
        var sts= 0;
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

      xmlhttp.open("GET","config/changecomponent.php?id="+prokey+"&sts="+sts+"&about=download",true);
      xmlhttp.send();
    }
</script>
