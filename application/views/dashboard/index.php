<!DOCTYPE html>
<html>
<head>
    <?php require_once(APPPATH.'views/include/head.php'); ?>
    <style>

        .nav-tabs>li>a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid #3c8dbc;
            border-radius: 4px 4px 0 0;
        }

    </style>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

    <?php require_once(APPPATH.'views/include/header.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once(APPPATH.'views/include/menu.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once(APPPATH.'views/include/footer.php'); ?>

</div>
<!-- ./wrapper -->
<?php require_once(APPPATH.'views/include/foot.php'); ?>

</body>
</html>
