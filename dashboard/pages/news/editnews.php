<?php include("../../../connect.php") ?>

<?php
    $id = $_GET["key"];
    $sqlz = "SELECT * from news where id_news = '$id'";
    $querye = mysqli_query($connect,$sqlz) or die(mysqli_error($connect));
    $resulte = mysqli_fetch_array($querye,MYSQLI_ASSOC)
?>

    <div class="modal-body">
    <input type="hidden" name="id_news" id="id_news" value="<?php echo $resulte["id_news"]; ?>">
    	<div class="form-group">
    		<label for="news_title">หัวข้อข่าว</label>
    		<input type="text" name="news_title" id="news_title" class="form-control" value="<?php echo $resulte["head_news"]; ?>">
    	</div>
    	<div class="form-group">
    		<label for="news_title">ประเภทข่าว</label>
    		<select name="news_type" id="news_type" class="form-control" value="<?php echo $resulte["id_type_news"]; ?>">
    			<?php
    				$sqlt = "SELECT * from type_news";
    				$querye = mysqli_query($connect,$sqlt) or die(mysqli_error($connect));
    				while($result = mysqli_fetch_array($querye,MYSQLI_ASSOC))
    				{
    			?>
    					<option value="<?php echo $result["id_type_news"]; ?>" <?php if(@$result["id_type_news"]==$resulte["id_type_news"]){echo"selected";}?>><?php echo $result["name_type_news"]; ?></option>
    			<?php
    				}
    			?>
    		</select>
    	</div>
    	<div class="form-group">
    		<label for="news_detail">รายละเอียดข่าว</label>
    		<textarea name="news_detail" id="news_detail" class="form-control" value=""><?php echo $resulte["description_news"]; ?></textarea>
    	</div>
    	<div class="form-group">
    		 <label for="img_news_file">รูปประกอบข่าว </label>
         <input type="hidden" name="img_news_files" id="img_news_files" value="<?php echo $resulte["images"]; ?>" />;
    		 <input type="file" name="img_news_file" id="img_news_file" class="form-control">
    	</div>
    	 <div class="form-group">
    		 <label for="news_status">สถานะ</label>
    		 <select name="news_status" id="news_status" class="form-control">
    			 <option value="0" <?php if(@$resulte["news_status"]=="0"){echo"selected";}?>>แสดง</option>
    			 <option value="1" <?php if(@$resulte["news_status"]=="1"){echo"selected";}?>>ซ่อน</option>
    		 </select>
    	</div>

    </div>
    <div class="modal-footer">
    		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> ปิด</button>
    		<button type="submit" name="save_edit_news" id="save_edit_news" class="btn btn-primary btn-sm" ><i class="fa fa-save fa-fw"></i> บันทึก</button>
    </div>
