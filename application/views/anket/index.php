
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
        .btn-app {
            border-radius: 3px;
            padding:unset;
            font-size: inherit;
            height: 25px;
            color: #fff;
            border: 1px solid #00a65a;
            background-color: #00a65a;
            cursor: pointer;
        }
        .delete-survey{
            border: 1px solid #dd4b39;
            background-color: #dd4b39;
        }
        .btn-app>.fa, .btn-app>.glyphicon, .btn-app>.ion {
            font-size: inherit;
           display: inline-block;
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
                <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li class="active">Anket Listesi</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <a href="<?php echo base_url('survey/create_form_builder');?>" style="margin: 10px;" class="pull-right btn btn-success btn-lg" ><i class="fa fa-plus"></i>&nbsp;
                    Yeni Anket Ekle
                </a>
               </br>
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title center-block">Anket Listesi</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Anket Adı</th>
                                    <th>Oluşturma Zamanı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($survey as $item){?>
                                <tr>
                                    <td> <?php echo $item['id'];?></td>
                                    <td><?php echo $item['survey_name'];?></td>
                                    <td><?php echo $item['created_by'];?></td>
                                    <td><?php echo $item['status']==1?'<span class="label label-success">Aktif</span>':'<span class="label label-warning">Pasif</span>'?></span></td>
                                    <td><a target="_blank" href="<?php echo base_url("Survey/render_survey/").$item['id']?>" class="btn btn-app">
                                            <i class="fa fa-play"></i> Çalıştır
                                        </a><a href="<?php echo base_url('survey/edit_survey/').$item['id']?>" class="btn btn-app">
                                            <i class="fa fa-edit"></i> Düzenle
                                        </a><a href="<?php echo base_url("Survey/result_survey/").$item['id']?>" class="btn btn-app result-survey">
                                            <i class="fa fa-bar-chart-o"></i> Sonuçlar
                                        </a><a href="<?php echo base_url("Survey/delete_survey/").$item['id']?>" class="btn btn-app delete-survey">
                                            <i class="fa fa-trash"></i> Sil
                                        </a></td>
                                </tr>
                                <?php }?>
                                </tbody></table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

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

<script>


</script>
</body>
</html>
