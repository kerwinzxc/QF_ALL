<?php if (!defined('THINK_PATH')) exit();?><!--
 @time 2017-1-20 12:10:36
 @author 严旭
-->
﻿<!doctype html>
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
        <ul class="nav nav-tabs" >
            <li class="active" ><a href="<?php echo U('Newapp/Message/index');?>" >消息列表</a ></li >
            <li ><a href="<?php echo U('Newapp/Message/add');?>" >添加</a ></li >
        </ul >
        <form class="well form-search" method="get" id="cid-form" action="/admin.php/Newapp/Message/index/menuid/357.html" >
            <div class="search_type cc mb10" >
                <div class="mb10" >
                    <span class="mr20" >   
                        关联游戏：
                        <?php echo ($app_select); ?>
                        消息标题：
                        <input type='text' name='title' style="width: 200px;height:35px;"
                               value='<?php echo ($formget["title"]); ?>' placeholder="消息标题" />
                        <button class='btn btn-primary' >搜索</button >
                    </span >
                    
                </div >
            </div >
        </form >
        <form class="js-ajax-form" method="post" >
            <div class="table-actions" >
                
            </div >

            <table class="table table-hover table-bordered table-list" >
                <thead >
                    <tr >
                        <th >ID</th >
                        <th >收件人</th >
                        <th >标题</th >
                        <th >内容</th >
                        <th >相关游戏</th >
                        <th >类型</th >
                        <th >发送时间</th >
                        <th >操作</th >
                    </tr >
                </thead >
                <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                        <td ><?php echo ($vo["id"]); ?></td >
                        <td ><?php echo ($vo["receiver"]); ?></td >
                        <td ><?php echo ($vo["title"]); ?></td >
                        <td ><?php echo ($vo["message"]); ?></td >
                        <td ><?php echo ($vo["game_name"]); ?></td >
                        <td ><?php echo ($vo["category_txt"]); ?></td >
                        <td ><?php echo ($vo["send_time"]); ?></td >
                        <td >
                            
                            <a href="<?php echo U('Newapp/Message/edit',array('id'=>$vo['id']));?>" >编辑</a >
                            |                           
                            <a href="<?php echo U('Newapp/Message/delete',array('id'=>$vo['id']));?>"
                               class="js-ajax-delete" >删除</a >
                        
                        </td >
                    </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
            </table >
            <div class="pagination" ><?php echo ($page); ?></div >
        </form >
    </div >
    <script src="/public/js/common.js" ></script >
    <script type="text/javascript" src="/public/js/content_addtop.js" ></script >

</body >
</html>