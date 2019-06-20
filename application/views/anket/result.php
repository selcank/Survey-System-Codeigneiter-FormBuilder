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
               Sonuçlar
                <small>Anket Sonuçları</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li class="active">Anket Sonuçları</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                         <label style="color: red;" id="message"></label><br>
                        <label>Anket Adı:</label>
                        <input style="border: 1px solid #3c8dbc; border-radius: 4px 4px 0 0;margin-bottom: 15px" id="survey_title" class="form-control col-sm-6" type="text" value="<?php //echo $survey_form_json->survey_name;?>" placeholder="Anket Adını Giriniz..">
                        </br>
                        </br>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Table With Full Features</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <?php $characters = json_decode($survey_form_json[0]->survey_result_json);?>
                                                        <?php for ($i=1;$i<=count((array)$characters);$i++) {
                                                            $idpage="page".$i;
                                                            foreach ($characters->$idpage as $items){?>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 297px;">
                                                            <?php echo $items->label;?>
                                                        </th>
                                                      <?php   }?>
                                                     <?php   }?>
                                                 </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach( $survey_form_json as $j => $unused ) {?>
                                                        <tr role="row" class="odd">
                                                    <?php
                                                    $characters2 = json_decode($survey_form_json[$j]->survey_result_json);?>
                                                    <?php for ($i=1;$i<=count((array)$characters2);$i++) {
                                                        $idpage="page".$i;
                                                        foreach ($characters2->$idpage as $items2){?>
                                                            <?php if (isset($items2->userData)){?>

                                                                <td class="sorting_1"><?php print_r( $items2->userData[0]);?></td>

                                                            <?php   }else{?>
                                                                <td class="sorting_1">-</td>
                                                         <?php   }?>
                                                        <?php   }?>
                                                    <?php   }?>
                                                        </tr>
                                                    <?php   }?>
                                                  </tbody>
                                                    <tfoot>
                                                    </tfoot>
                                                </table></div></div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-content -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-render.min.js"></script>




</body>
</html>
