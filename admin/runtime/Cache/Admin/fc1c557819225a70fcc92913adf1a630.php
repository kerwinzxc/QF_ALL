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
<body >
<div class="wrap js-check-wrap" >
    <form class="well form-search" method="post" action="<?php echo U('Admin/Log/actionindex');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
					<span class="mr20" >
					管理员账号： 
					<input type="text" name="username"
                           style="width: 150px;" value="<?php echo ($formget["username"]); ?>"
                           placeholder="请输入管理员账号..." >
						&nbsp;&nbsp; 
					管理员ID： 
					<input type="text" name="userid"
                           style="width: 150px;" value="<?php echo ($formget["userid"]); ?>"
                           placeholder="请输入管理员ID..." >
						&nbsp;&nbsp; 
					时间：
					<input type="text" name="start_time"
                           class="js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>"
                           style="width: 80px;" autocomplete="off" >
					- 
					<input type="text" class="js-date" name="end_time"
                           value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;"
                           autocomplete="off" > &nbsp; &nbsp;
					</span >
                <input type="submit" name='submit' class="btn btn-primary" value="搜索" />
            </div >
        </div >
    </form >
    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width=50 >序号</th >
                <th width=50 >管理员ID</th >
                <th width=50 >管理员账号</th >
                <th width=50 >操作action</th >
                <th width=50 style="word-wrap:break-word;word-break:break-all;" >操作信息</th >
                <th width=150 style="word-wrap:break-word;word-break:break-all;" >操作参数</th >
                <th width=50 >操作时间</th >
                <th width=50 >操作IP</th >
                <th width=50 >操作IP归属地</th >
            </tr >
            </thead >
            <?php if(is_array($logs)): foreach($logs as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["id"]); ?></td >
                    <td ><?php echo ($vo["user_id"]); ?></td >
                    <td ><?php echo ($vo["username"]); ?></td >
                    <td ><?php echo ($vo["action"]); ?></td >
                    <td style="word-wrap:break-word;word-break:break-all;" ><?php echo ($vo["remark"]); ?></td >
                    <td style="word-wrap:break-word;word-break:break-all;" ><?php echo ($vo["param"]); ?></td >
                    <td ><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td >
                    <td ><?php echo ($vo["ip"]); ?></td >
                    <td ><?php echo ($vo["addr"]); ?></td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >

    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>