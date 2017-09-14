

<?php
    $page = @$_GET["page"];

    if($page == 'managewebpage')
    {
        include("managewebpage.php");
    }
    else if($page == "administrator")
    {
        include("admin.php");
    }
    else if($page == "setting_backup")
    {
        include("setting_backup.php");
    }
    else
    {
      echo  "<div class='panel panel-yellow'>
                        <div class='panel-heading'>
                           ตั้งค่าเว็บไซต์
                        </div>
                        <div class='panel-body'>
                           <a href='?file=config&page=managewebpage' class='btn btn-default'>
                             <span class='text_white'>
                               <i class='fa fa-unlock-alt fa-fw fa-6x'></i><br/><br/> จัดการหน้าแรก
                             </span>
                           </a>
                           <a href='?file=config&page=administrator' class='btn btn-default'>
                             <span class='text_white'>
                               <i class='fa fa-user fa-fw fa-6x'></i><br/><br/> ปรับเปลี่ยนผู้บริหาร
                             </span>
                           </a>
                           <a href='?file=config&page=setting_backup' class='btn btn-default btn_main_wd'>
                              <i class='fa fa-database fa-fw fa-6x'></i><br><br>สำรองข้อมูล
                           </a>
                        </div>
                    </div>
                </div>";

    }
  ?>
