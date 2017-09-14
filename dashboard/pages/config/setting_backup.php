<!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="backup"><br/>
<div class="panel panel-primary">
                        <div class="panel-heading">
                          ฐานข้อมูลที่สำรองไว้ทั้งหมด<span class="pull-right" style="margin-right:-8px; margin-top:-5px;"><form name="form1" method="post" action="">

  <button type="submit" name="backup" class="btn btn-default btn-xs"><i class="fa fa-database fa-fw"></i> สำรองข้อมูล เดี๋ยวนี้</button></form></span>
                        </div>
                          <div class="table-responsive tooltipx">
  <table width="100%" border="0" class="table table-bordered  table-hover">
  <thead>
  <tr class="table_header">
    <td width="7%" align="center" >#</td>
    <td width="27%" align="center" >ชื่อไฟล์</td>
    <td width="18%" align="center" >วันที่</td>
    <td width="19%" align="center" >ผู้ทำรายการ</td>
    <td width="29%" align="center" >จัดการ</td>
  </tr>
  </thead>
  <tbody>
    <tr  id="4e9fc7c4573b6c4fafbb987002fcb37a">
    <td align="center">1</td>
    <td>&nbsp;2017-09-09.bk.sql</td>
    <td align="center">09/09/2560 02:19:49</td>
    <td align="center">ปารณัท&nbsp;&nbsp;&nbsp;กลิ่นหอม</td>
    <td align="center"><a href="function.php?type=download_backup&key=4e9fc7c4573b6c4fafbb987002fcb37a" class="btn btn-success btn-xs"><i class="fa fa-download fa-fw"></i>ดาวน์โหลด</a><a href="settings/go_restore.php?fn=2017-09-09.bk.sql" class="btn btn-warning btn-xs"><i class="fa fa-rotate-left fa-fw"></i>กู้คืนฐานข้อมูล</a><div class="btn btn-danger btn-xs" title="ลบ" onClick="javascript:deleteBackup('4e9fc7c4573b6c4fafbb987002fcb37a');"><i class="fa fa-times fa-fw"></i>ลบ</div></td>
    </tr>
    </tbody>
</table>
</div>
</div>

                                </div>
                                <div class="tab-pane fade" id="restore"><br/>
                                  <form method="post" enctype="multipart/form-data" name="form3" id="form3">
                                    <table width="100%" border="0">
                                      <tr>
                                        <td width="91%"><div class="input-group ">
                          <span class="input-group-addon">ไฟล์สำหรับกู้คืนฐานข้อมูล</span>

                                    <input type="file" name="file_restore" id="file_restore" class="form-control">
                                    </div></td>
                                        <td width="9%"><button type="submit" name="submit_restore" id="submit_restore" class=" btn btn-sm btn-danger"><i class="fa fa-history fa-fw"></i> กู้คืนฐานข้อมูล</button></td>
                                      </tr>
                                    </table>

                                  </form>
                                </div>
                               <!-- <div class="tab-pane fade" id="cloud"><br/>
                                    <h4>Cloud Backup</h4>

                                </div>-->

                            </div>
