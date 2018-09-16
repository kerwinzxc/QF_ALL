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
        <li class="active" ><a href="<?php echo U('Data/Role/index');?>" >角色信息</a ></li >
    </ul >
    <form class="well form-search" method="get"
          action="<?php echo U('Sdk/PlayerRole/index');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                <!--账号       -->
					<span class="mr20" >
					玩家账号： 
					<input type="text" name="username" style="width: 150px;" value="<?php echo ($formget["username"]); ?>"
                           placeholder="请输入账号..." >
						&nbsp;&nbsp;&nbsp;&nbsp; 
                    游戏名称：
                    <?php echo ($app_select); ?>
&nbsp;&nbsp;

                    区服：
					<input type="text" name="server"
                           style="width: 150px;" value="<?php echo ($formget["server"]); ?>"
                           placeholder="请输入区服..." >
						<br ><br >
                    角色名：
					<input type="text" name="role" style="width: 150px;" value="<?php echo ($formget["role"]); ?>"
                           placeholder="请输入角色..." >

                        &nbsp;&nbsp;

					  时间：<input type="text" name="start_time" class="js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>"
                                style="width: 100px;" autocomplete="off" placeholder="开始时间..." >-
						<input type="text" name="end_time" class="js-date" value="<?php echo ((isset($formget["end_time"]) && ($formget["end_time"] !== ""))?($formget["end_time"]):''); ?>"
                               style="width: 100px;" autocomplete="off" placeholder="结束时间..." >                                                &nbsp; &nbsp;
                    <input type="submit" class="btn btn-warning" name='date_time' value="搜索" />
					</span >
            </div >
        </div >
    </form >
    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th >玩家账号</th >
                <!--<th >注册渠道</th >-->
                <th >游戏名称</th >
                <th >区服</th >
                <th >角色</th >
                <th >等级</th >
                <th >充值总额</th >
                <th >更新时间</th >

                <!--<th >操作管理</th >-->
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo['username']); ?></td >
                    <td ><?php echo ($games[$vo['app_id']]); ?></td >
                    <td ><?php echo ($vo['server']); ?></td >
                    <td ><?php echo ($vo['role']); ?></td >
                    <td ><?php echo ($vo['level']); ?></td >
                    <td ><?php echo ($vo['money']); ?></td >
                    <!--<td ><?php echo ($vo['experience']); ?></td >-->
                    <td ><?php echo (date('Y-m-d H:i:s',$vo["update_time"])); ?></td >
                    <!--<td ><?php echo ($vo['level']); ?></td >-->
                </tr ><?php endforeach; endif; ?>
            <tfoot >
            </tfoot >
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >

    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>