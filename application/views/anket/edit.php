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
                         <label style="color: red;" id="message"></label><br>
                        <label>Anket Adı:</label>
                        <input style="border: 1px solid #3c8dbc; border-radius: 4px 4px 0 0;margin-bottom: 15px" id="survey_title" class="form-control col-sm-6" type="text" value="<?php echo $survey_form_json->survey_name;?>" placeholder="Anket Adını Giriniz..">
                        </br>
                        </br>
                        <form action="" id="form-builder-pages">
                            <ul  id="tabs" class="nav nav-tabs">

                            </ul>

                            <div class="tab-content">

                                <!-- /.tab-pane -->
                            </div>
                        </form>
                        <div class="save-all-wrap"><button id="save-all" class="btn btn-success" type="button">Kaydet</button></div>
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
<script>
    $(".nav-tabs").on("click", "a", function (e) {
        e.preventDefault();
        if (!$(this).hasClass('add-contact')) {
            $(this).tab('show');
        }
    }) .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });


    $(document).ready(function () {

        var formData_s = '[<?php echo $survey_form_json->survey_form_json;?>]';
        var templates=JSON.parse(formData_s);
        var str="";
        var strcontent="";
        Object.keys(templates[0]).forEach(function(key) {
            formData=JSON.stringify(templates[0][key]);
            str += "<li class=''><a data-toggle='tab' aria-expanded='true' href='#"+key+"'>"+key+"</a></li>";
            strcontent+='<div class="tab-pane active" id="'+key+'"><div id="build-wrap-'+key+'"></div></div>';
        });
        str += '<li id="add-page-tab" class=""><a  href="#new-page" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus"></i>Yeni Sayfa</a></li>';
        strcontent+=' <div id="new-page"></div>';
        $(".nav-tabs").append(str);
        $("#form-builder-pages .tab-content").append(strcontent);
        $('.nav-tabs a[href="#page1"]').tab('show');
        var t,formData="";
        var formid,formBuilder,$fbTemplate1;
        Object.keys(templates[0]).forEach(function(key) {
            t="build-wrap-"+key;
            formid= document.getElementById(t);
            $fbTemplate1=$(formid);
            formData = JSON.stringify(templates[0][key]);
            if(formData!=''){
                formBuilder = $fbTemplate1.formBuilder({ formData });
            }

            formBuilder.promise.then(function(fb) {
                console.log(fb.formData);
            });


        });


    });

    jQuery($ => {
        "use strict";
        var $fbPages = $(document.getElementById("form-builder-pages"));
        var addPageTab = document.getElementById("add-page-tab");
        var fbInstances = [];

        $fbPages.tabs({
            beforeActivate: function(event, ui) {
                if (ui.newPanel.selector === "#new-page") {
                    return false;
                }
            }
        });
        addPageTab.addEventListener("click", function(){
            var tabCount = document.getElementById("tabs").children.length,
                tabId = "page" + tabCount.toString(),
                $newPageTemplate = $(document.getElementById("new-page")),
                $newPage = $newPageTemplate
                    .clone()
                    .attr("id", tabId)
                    .addClass("fb-editor"),
                $newTab = $(this)
                    .clone()
                    .removeAttr("id"),
                $tabLink = $("a", $newTab)
                    .attr("href", "#" + tabId)
                    .text("Page " + tabCount);

            $newPage.insertBefore($newPageTemplate);
            $newTab.insertBefore(this);
            $fbPages.tabs("refresh");
            $fbPages.tabs("option", "active", tabCount - 1);
            fbInstances.push($newPage.formBuilder());
        },false);

        fbInstances.push($(".fb-editor").formBuilder());

        $(document.getElementById("save-all")).click(function() {
            const allData = fbInstances.map(fb => {
                debugger;
                return fb.actions.getData();
                // console.log(fb.formData);
            });
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('ajax/update_survey')?>",
                  dataType: "JSON",
                  data: {
                      data:allData,
                      title: $('#survey_title').val(),
                      formid:<?php echo $survey_form_json->id;?>
                  },
                  success: function(result) {
                      if(result.message=='OK'){
                          window.location.href = "<?php echo base_url('survey/index/');?>"+result.survey_id;
                      }else {
                          $('#message').html(result.message);
                      }
                  },
                  error: function(result) {
                      alert('error');
                  }
              });
            console.log(allData);
        });
    });
    $(function() {
        $( "#tabs" ).sortable();
        $( "#tabs" ).disableSelection();
    });
</script>
</body>
</html>
