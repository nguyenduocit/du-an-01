<?php 
  session_start();
  require_once("../../autoload/autoload.php");
?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once('../template/head.php') ?>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <?php require_once ('../template/header.php') ?>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
            <?php require_once ('../template/sidebar.php') ?>
        <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Fixed Layout
                <small>Blank example to the fixed layout</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Layout</a></li>
                <li class="active">Fixed</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="callout callout-info">
                <h4>Tip!</h4>

                <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
                  is bigger than your content because it prevents extra unwanted scrolling.</p>
              </div>
              <!-- Default box -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Title</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  Start creating your amazing application!
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  Footer
                </div>
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrappeontent Wrapper. Contains page content -->

        <footer class="main-footer">
            <?php require_once ('../template/footer.php') ?>
        </footer>

        <!-- Control Sidebar -->

        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- link java script  -->
        <?php require_once ('../template/link-java-script.php') ?>
    <!-- end link java script -->
</body>
</html>
