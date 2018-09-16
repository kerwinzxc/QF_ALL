<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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
<body >
<div class="wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="#" data-toggle="tab" ><?php echo L('ADMIN_MAILER_INDEX');?></a ></li >
    </ul >
    <form method="post" class="form-horizontal js-ajax-form" action="<?php echo U('Admin/mailer/index_post');?>" >
        <fieldset >
            <div class="control-group" >
                <label class="control-label" ><?php echo L('SENDER_NAME');?></label >
                <div class="controls" >
                    <input type="text" name="sender" value="<?php echo ($emaildata["sender"]); echo (C("SP_MAIL_SENDER")); ?>" />
                    <span class="form-required" >*</span >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" ><?php echo L('SENDER_EMAIL_ADDRESS');?></label >
                <div class="controls" >
                    <input type="text" name="address" value="<?php echo ($emaildata["address"]); echo (C("SP_MAIL_ADDRESS")); ?>" />
                    <span class="form-required" >*</span >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" ><?php echo L('SENDER_SMTP_SERVER');?></label >
                <div class="controls" >
                    <input type="text" name="smtp" value="<?php echo ($emaildata["smtp"]); echo (C("SP_MAIL_SMTP")); ?>" />
                    <span class="form-required" >*</span >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >SMTP服务器端口</label >
                <div class="controls" >
                    <input type="text" name="smtp_port" value="<?php echo ($emaildata["smtp_port"]); ?>" />
                    <span class="form-required" >*默认为25</span >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" ><?php echo L('SMTP_MAIL_ADDRESS');?></label >
                <div class="controls" >
                    <input type="text" name="loginname"
                           value="<?php echo ($emaildata["username"]); echo (C("SP_MAIL_LOGINNAME")); ?>" />
                    <span class="form-required" >*</span >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" ><?php echo L('SMTP_MAIL_PASSWORD');?></label >
                <div class="controls" >
                    <input type="password" name="password"
                           value="<?php echo ($emaildata["password"]); ?> <?php echo (C("SP_MAIL_PASSWORD")); ?>" />
                    <span class="form-required" >*</span >
                </div >
            </div >
            <div class="form-actions" >
                <button type="submit" class="btn btn-primary js-ajax-submit" ><?php echo L('SAVE');?></button >
            </div >
        </fieldset >
    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>