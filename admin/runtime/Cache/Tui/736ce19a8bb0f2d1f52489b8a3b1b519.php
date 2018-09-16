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
</head>
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Tui/Settle/okrecord');?>" target="_self" >打款记录</a ></li >
    </ul >
    <form class="well form-search" method="get" action='/admin.php/Tui/Settle/okrecord/menuid/284.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                    <span class="mr20" >
                        渠道账号：
                        <?php echo ($agent_select); ?>
                        <input type="submit" class="btn btn-primary" value="搜索" />
                    </span >
            </div >
        </div >
    </form >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width="20" >ID</th >
                <th width="50" >渠道名</th >
                <th width="50" >渠道联系人</th >
                <th width="50" >qq</th >
                <th width="50" >电话</th >
                <th width="50" >提现帐号</th >
                <th width="50" >银行名</th >
                <th width="50" >开户支行</th >
                <th width="50" >持卡人</th >
                <th width="50" >金额</th >
                <th width="50" >打款时间</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["id"]); ?></td >
                    <td ><?php echo ($vo["user_login"]); ?></td >
                    <td ><?php echo ($vo["user_nicename"]); ?></td >
                    <td ><?php echo ($vo["qq"]); ?></td >
                    <td ><?php echo ($vo["mobile"]); ?></td >
                    <td ><?php echo ((isset($vo["banknum"]) && ($vo["banknum"] !== ""))?($vo["banknum"]):$vo['d_linkman']); ?></td >
                    <td ><?php echo ((isset($vo["bankname"]) && ($vo["bankname"] !== ""))?($vo["bankname"]):$vo['d_bankname']); ?></td >
                    <td ><?php echo ((isset($vo["branchname"]) && ($vo["branchname"] !== ""))?($vo["branchname"]):$vo['d_branchname']); ?></td >
                    <td ><?php echo ((isset($vo["cardholder"]) && ($vo["cardholder"] !== ""))?($vo["cardholder"]):$vo['d_linkman']); ?></td >
                    <td ><?php echo ($vo["money"]); ?></td >
                    <td ><?php echo (date("Y-m-d H:i:s",$vo["settle_time"])); ?></td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >
    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>