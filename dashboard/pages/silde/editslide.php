<?php include("../../../connect.php") ?>

<?php
    $id = $_GET["key"];
    $sqlz = "SELECT * from slideshow where slide_key = '$id'";
    $querye = mysqli_query($connect,$sqlz) or die(mysqli_error($connect));
    $resulte = mysqli_fetch_array($querye,MYSQLI_ASSOC)
?>

<div class="modal-body">
  <div class="form-group">
    <input type="hidden" name="slide_key" id="slide_key" value="<?php echo $resulte["slide_key"]; ?>">
    <label for="edit_slide_link">
      ลิงค์
    </label>
    <input type="text" name="edit_slide_link" id="edit_slide_link" value="<?php echo $resulte["slide_link"]; ?>" class="form-control">
  </div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
    <i class="fa fa-times fa-fw"></i>
    ปิด
  </button>
  <button type="submit" name="save_edit_slide" id="save_edit_slide" class="btn btn-primary btn-sm">
    <i class="fa fa-save fa-fw"></i>
    บันทึก
  </button>
</div>
