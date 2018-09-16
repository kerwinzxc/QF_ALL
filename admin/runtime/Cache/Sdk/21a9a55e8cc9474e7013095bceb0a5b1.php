<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
<head >
    <meta charset="utf-8" >
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" ></script >
    <![endif]-->

    <link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet" >
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet" >
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
    <style >
        .length_3 {
            width: 180px;
        }

        form .input-order {
            margin-bottom: 0px;
            padding: 3px;
            width: 40px;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .select2-container .select2-dropdown {
            z-index: 99999999;
        }
    </style >
    <!--[if IE 7]>
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css" >
    <![endif]-->
    <script type="text/javascript" >
        //全局变量
        var GV = {
            DIMAUB : "/",
            JS_ROOT: "public/js/",
            TOKEN  : ""
        };
    </script >
    <!-- Le javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/jquery.js" ></script >
    <script src="/public/js/wind.js" ></script >
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js" ></script >
    <!--<script src="/public/3rd/datatable/js/jquery.dataTables.js" ></script >-->
    <!--<link href="/public/3rd/datatable/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" >-->
    <?php if(APP_DEBUG): ?><style >
            #think_page_trace_open {
                z-index: 9999;
            }
        </style ><?php endif; ?>

    <link rel="stylesheet" type="text/css" href="/public/select2/css/select2.min.css" />
    <script src="/public/select2/js/select2.min.js" ></script >
    <script type="text/javascript" src="/public/select2/js/i18n/zh-CN.js" ></script >
    <script >
        $(document).ready(function () {
            if($.isFunction($.select2)){
                $(".select_2").select2({
                    language: "zh-CN"
                });
            }

//$('table').dataTable({"info": false,"paging": false,"lengthChange": false,"searching": false,"ordering": false});

            $(".form-search select").change(function () {
//        $("input[name='submit']").click();
                $("input[value='搜索']").click();
            });
        });

    </script >

    <script src="/public/3rd/layer/layer.js" ></script >
    <script src="/public/huoshu/share.js" ></script >
<style >
    .select2-container .select2-dropdown {
        z-index: 99999999;
    }
</style >
</head>
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Sdk/Cp/index');?>" >CP列表</a ></li >
    </ul >



    <link rel="stylesheet" href="/public/admin/css/share.css" />
    <div class='funcs' >
        <a class='btn btn-success add_game_btn' href="javascript:;" >添加CP</a >
    </div >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width=50 >CPID</th >
                <th width=150 >CP名称</th >
                <th width=50 >联系人</th >
                <th width=50 >联系电话</th >
                <th width=100 >职位</th >
                <th width=150 >创建时间</th >
                <th width=150 >修改时间</th >
                <th width=150 >操作</th >
            </tr >
            </thead >
            <?php if(is_array($cp_data)): foreach($cp_data as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["id"]); ?></td >
                    <td ><?php echo ($vo["company_name"]); ?></td >
                    <td ><?php echo ($vo["contacter"]); ?></td >
                    <td ><?php echo ($vo["mobile"]); ?></td >
                    <td ><?php echo ($vo["position"]); ?></td >
                    <td >20<?php echo (date("y-m-d H:i:s",$vo["create_time"])); ?></td >
                    <td >20<?php echo (date("y-m-d H:i:s",$vo["update_time"])); ?></td >
                    <td >
                        <a href="<?php echo U('Cp/deleteCP',array('cp_id'=>$vo['id']));?>" >删除 </a >
                        |
                        <a href="<?php echo U('Cp/editCp',array('cp_id'=>$vo['id']));?>" >编辑 </a >


                    </td >


                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >

    </form >
</div >

<div class="pop_up_form_div container" id='add_game' style="display:none;" >
    <div class="row" >
        <div class="col-md-4" >CP名称</div >
        <div class="col-md-8" >
            <input type="text" name="company_name" />
        </div >
        <div class="col-md-4" >联系人</div >
        <div class="col-md-8" >
            <input type="text" name="contacter" />
        </div >
        <div class="col-md-4" >联系电话</div >
        <div class="col-md-8" >
            <input type="text" name="mobile" />
        </div >
        <div class="col-md-4" >职位</div >
        <div class="col-md-8" >
            <input type="text" name="position" />
        </div >


    </div >

    <div class="row" style="margin-top:20px;" >
        <button class="btn btn-success pop_up_form_submit_btn" id='agent_submit_btn' >确认</button >
    </div >
</div >
<script >
    $(".add_game_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "添加CP",
            content: $('#add_game'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $(".pop_up_form_submit_btn").click(function () {
        var url      = "<?php echo U('Sdk/Cp/addPost');?>";
        var company_name     = $("input[name='company_name']").val();
        var contacter = $("input[name='contacter']").val();
        var mobile = $("input[name='mobile']").val();
        var position = $("input[name='position']").val();
        var data     = {"company_name": company_name,
                         "contacter": contacter,
                         "mobile": mobile,
                         "position": position
                };
        $.post(url, data, function (res) {
            if (res.error == "0") {
                yxalert(res.msg);
            } else if (res.error == "1") {
                yxalert(res.msg);
                reload_delay();
            }
        })
    });
</script >

<script src="/public/js/common.js" ></script >

<script src="/public/share/clipboard/clipboard.min.js" ></script >
<script src="/public/share/clipboard/clipboard.js" ></script >
<link href="/public/share/clipboard/clipboard.css" rel="stylesheet" type="text/css" >

</body >
</html>