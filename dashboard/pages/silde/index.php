<?php include('../../connect.php'); ?>
<?php

		if(isset($_POST["save_edit_slide"]))
		{
				$slidekey = $_POST["slide_key"];
				$editslidelink = $_POST["edit_slide_link"];
				$alert = '';

				if($slidekey != '')
				{
					$SQL = "UPDATE slideshow SET slide_link = '$editslidelink' WHERE slide_key = '$slidekey' ";
					$objQuery = mysqli_query($connect,$SQL) or die (mysqli_error($connect));
					$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขสไลด์เรียบร้อย</div>';
				}
				else {
					$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>กรุณาเปลี่ยนแปลงข้อมูลเพื่อแก้ไข สไลด์</div>';
				}
				echo @$alert;
		}

?>
<div id="error"></div>
<div class="panel panel-yellow">
  <!-- Default panel contents -->
	<div class="panel-heading">
		สไลด์ทั้งหมด
		<span class="pull-right btn_top_right">
			<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#formaddslides">
				<i class="fa fa-plus fa-fw"></i> เพิ่มสไลด์ใหม
			่</button>
	  </span>
	</div>
   <div class="table-responsive">
  <!-- Table -->
  <table width="100%" class="table">
  <thead>
  <tr class="table_header">
    <td width="3%" จัดการ>#</td>
    <td width="13%" จัดการ>รูปสไลด์</td>
    <td width="54%" จัดการ>ลิงค์</td>
    <td width="22%" จัดการ>จัดการ</td>
  </tr>
  </thead>
  <tbody>
		<?php
		  $x=0;
			$sqlt = "SELECT * from slideshow";
			$querye = mysqli_query($connect,$sqlt) or die(mysqli_error($connect));
			while($result = mysqli_fetch_array($querye,MYSQLI_ASSOC))
			{
					$x++;
		?>
					<tr id="<?php $result["slide_key"]; ?>">
						<td align="center" bgcolor="#eeeeee">
							<?php echo @$x; ?>
						</td>
						<td align="center">
							<img src="../../img/slide/<?php echo $result["slide_file"]; ?>" width="120" id="img_border" alt=""/>
						</td>
						<td>
							<?php echo $result["slide_link"]; ; ?>
						</td>
						<td align="right" valign="middle">
							<?php
							  if($result["slide_status"] == '0'){
								  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.$result["slide_key"].'" onClick="javascript:changeSlideStatus(\''.$result["slide_key"].'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.$result["slide_key"].'"></i> <span id="text-'.$result["slide_key"].'">แสดง</span></button>';
							  }else{
								  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.$result["slide_key"].'" onClick="javascript:changeSlideStatus(\''.$result["slide_key"].'\',\'th\');"><i class="fa fa-lock" id="icon-'.$result["slide_key"].'"></i> <span id="text-'.$result["slide_key"].'">ซ่อน</span></button>';
							  }
					  	?>
							<a class="btn btn-info btn-xs" style="color:#FFF;" data-toggle="modal" data-target="#edit_slide" data-whatever="<?php echo $result["slide_key"];?>">
								<i class="fa fa-edit"></i> แก้ไข
							</a>
							<button type="button" class="btn btn-danger btn-xs" onClick="javascript:deleteSlide('<?php echo $result["slide_key"]; ?>');">
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



<div class="modal fade" id="formaddslides" role="dialog">
	<form method="post" enctype="multipart/form-data" id="formaddslide" name="formaddslide">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มสไลด์ใหม่</h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                             <label for="slide_file">รูปสไลด์ </label>
                                             <input type="file" name="slide_file" id="slide_file" class="form-control">
                                          </div>
                                            <div class="form-group">
                                            <label for="slide_link">ลิงค์</label>
                                            <input type="text" name="slide_link" id="slide_link" class="form-control">
                                          </div>
                                           <div class="form-group">
                                             <label for="slide_status">สถานะ</label>
                                             <select name="slide_status" id="slide_status" class="form-control">
                                               <option value="1" selected="selected">แสดง</option>
                                               <option value="0">ซ่อน</option>
                                             </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> ปิด</button>
                                            <button type="submit" name="save_slide" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> บันทึก</button>
                                        </div>
                                    </div>
                                </div>
    </form>
</div>
  <!-- /.modal -->


	<!-- Modal Edit -->
	<div class="modal fade" id="edit_slide" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
	    <form id="form3c" name="form3c" enctype="multipart/form-data" method="post" >
	     <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
	                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูล</h4>
	                </div>
	                <div class="ct">

	                </div>
	            </div>
	        </div>
	  </form>
	</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	 $('#edit_slide').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget) // Button that triggered the modal
					var recipient = button.data('whatever') // Extract info from data-* attributes
					var modal = $(this);
					var dataString = 'key=' + recipient;

						$.ajax({
								type: "GET",
								url: "silde/editslide.php",
								data: dataString,
								cache: false,
								success: function (data) {
										console.log(data);
										modal.find('.ct').html(data);
								},
								error: function(err) {
										console.log(err);
								}
						});
		});
});

$('#formaddslide').submit(function(evt) {
			evt.preventDefault();
			var formData = new FormData($(this)[0]);
			$.ajax({
				    async: false,
						url: 'silde/addslide.php',
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success :  function(response)
						{
							  console.log(response);
								if(response.trim()=="0")
								{
										 $("#formaddslides").modal('toggle');
										//  $('.modal-backdrop').hide();
										 $("#error").fadeIn(1000, function()
										 {
															$("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; เพิ่มสไลด์เรียบร้อยแล้ว ! !</div>');
										 });
								}
								else if(response.trim()=="1")
								{
										 $("#formaddslides").modal('toggle');
										//  $('.modal-backdrop').hide();
										 $("#error").fadeIn(1000, function()
										 {
															 $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; กรุณาปรับขนาดภาพใหม่ให้เท่ากับ 1045 x 271 !</div>');
										 });
								}
						 }
			});
});

</script>

<script type="text/javascript">

function changeSlideStatus(prokey,lang)
{
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

	xmlhttp.open("GET","silde/change_slide_status.php?type=change_slide_status&key="+prokey+"&sts="+sts,true);
	xmlhttp.send();
}

function deleteSlide(slidekey)
{
	if(confirm("ต้องการลบสไลด์นี้ใช่หรือไม่ ?"))
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
				xmlhttp.open("GET","silde/deleteslide.php?type=delete_news&key="+slidekey,true);
				xmlhttp.send();
				window.location.reload();
		}
}


</script>
