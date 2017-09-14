<?php include('../template/doctype.php'); ?>
<?php include('../../connect.php'); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; width:100%">
            <?php include('../template/top_menu_responsive.php') ?>
            <?php include('../template/top_menu.php') ?>
            <?php include('../template/menu.php') ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      <?php
                          if (isset($_GET['file']))
                          {
                             if($_GET['file'] == "news")
                             {
                                echo "<i class='fa fa-newspaper-o fa-fw'></i> ข่าวสาร";
                             }
                             else if ($_GET['file'] == "slide")
                             {
                                echo "<i class='fa fa-picture-o'></i> สไลด์";
                             }
                             else if ($_GET['file'] == "config")
                             {
                                echo "<i class='fa fa-gear  fa-fw'></i> ตั้งค่าเว็บไซต์";
                             }
                          }
                          else {
                            echo "<i class='fa fa-home fa-fw'></i> หน้าแรก";
                          }
                        ?>
                      </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <ol class="breadcrumb">
              <li><a href="index.php">หน้าแรก</a></li>
              <?php
                  if (isset($_GET['file']))
                  {
                     if($_GET['file'] == "news")
                     {
                        echo "<li class='active'>ข่าวสาร</li>";
                     }
                     else if ($_GET['file'] == "slide")
                     {
                        echo "<li class='active'>สไลด์</li>";
                     }
                     else if ($_GET['file'] == "config")
                     {
                        if(@$_GET['page'] == 'managewebpage')
                        {
                            echo "<li class='active'><a href='?file=config'>ตั้งค่าเว็บไซต์</a></li>";
                            echo "<li class='active'>จัดการหน้าหลัก</li>";
                        }
                        else if(@$_GET['page'] == 'managewebpage')
                        {
                            echo "<li class='active'>ตั้งค่าเว็บไซต์</li>";
                        }
                        if(@$_GET['page'] == 'administrator')
                        {
                            echo "<li class='active'><a href='?file=config'>ตั้งค่าเว็บไซต์</a></li>";
                            echo "<li class='active'>ปรับเปลี่ยนผู้บริหาร</li>";
                        }
                        else if(@$_GET['page'] == 'administrator')
                        {
                            echo "<li class='active'>ตั้งค่าเว็บไซต์</li>";
                        }
                        else if(@$_GET['page'] == 'setting_backup')
                        {
                            echo "<li class='active'><a href='?file=config'>ตั้งค่าเว็บไซต์</a></li>";
                            echo "<li class='active'>สำรองข้อมูล</li>";
                        }
                     }
                  }
                  else {
                    echo "<li></li>";
                  }
                ?>
            </ol>
              <?php
              $file = (! empty($_GET['file'])) ? $_GET['file'] : include("dashboard/index.php") ;
              if ($file=="news")
                require ("news/index.php");
              if ($file=="slide")
                include ("silde/index.php");
              if ($file=="config")
                include ("config/index.php");
              ?>

          </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
