<?php if (!defined('THINK_PATH')) exit();?><!--
 @time 2017-1-19 11:13:09
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
<body class="J_scroll_fixed" >
    <div class="wrap js-check-wrap" >
        <ul class="nav nav-tabs" >
            <li class="active" ><a href="<?php echo U('Newapp/Gameserver/index');?>" >开服列表</a ></li >
            <li ><a href="<?php echo U('Newapp/Gameserver/add');?>" >添加</a ></li >
        </ul >
        <form class="well form-search" method="get" id="cid-form" action='/admin.php/Newapp/Gameserver/index.html' >
            <div class="search_type cc mb10" >
                <div class="mb10" >
                    <span class="mr20" >
                        选择游戏：
                        <?php echo ($app_select); ?>

                        开服标识：
                        <input type='text' name='ser_code' style="width: 200px;height:35px;"
                               value='<?php echo ($formget["ser_code"]); ?>' placeholder="请输入开服标识" />
                        开服名称：
                        <input type='text' name='ser_name' style="width: 200px;height:35px;"
                               value='<?php echo ($formget["ser_name"]); ?>' placeholder="请输入开服名称" />
                        <button class='btn btn-primary' >搜索</button >
                    </span >
                    
                </div >
            </div >
        </form >
        <form class="js-ajax-form" method="post" >
            <div class="table-actions" >
                <?php if (C('G_OA_EN')) { ?>
                <a href="javascript:;" class="checkOaGame"
                   ahref="<?php echo U('Newapp/Gameserver/addOldServer');?>" >同步已有数据未在此列表的所有区服 </a >
                <?php } ?>
            </div >

            <table class="table table-hover table-bordered table-list" >
                <thead >
                    <tr >
                        <th >游戏</th >
                        <th >开服标识</th >
                        <th >开服名称</th >
                        <th >开服描述</th >
                        <th >开服时间</th >
                        <th >状态</th >
                        <th >操作</th >
                    </tr >
                </thead >
                <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                        <td >
                            <img src="<?php echo ($vo["game_icon"]); ?>" alt="" style="height:50px;" />
                            <?php echo ($vo["game_name"]); ?>
                        </td >
                        <td >
                            <?php echo ($vo["ser_code"]); ?>
                        </td >
                        <td >
                            <?php echo ($vo["ser_name"]); ?>
                        </td >
                        <td ><?php echo ($vo["ser_desc_striped"]); ?></td >
                        <td ><?php echo ($vo["start_time"]); ?></td >
                        <td ><?php echo ($vo["status_txt"]); ?></td >
                        <td >
                            <a href="<?php echo U('Newapp/Gameserver/edit',array('id'=>$vo['id']));?>" >编辑</a >
                            | 
                            <a href="<?php echo U('Newapp/Gameserver/deletePost',array('id'=>$vo['id']) );?>"
                               class='js-ajax-delete' >删除</a >
                            <?php if (C('G_OA_EN')) { ?>    |
                        <a href="javascript:;" class="checkOaGame"
                           ahref="<?php echo U('Newapp/Gameserver/checkOaGameServer',array('id'=>$vo['id']));?>" >同步到oa </a >
                            <?php } ?>
                        </td >
                    </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
            </table >
            <div class="pagination" ><?php echo ($page); ?></div >
        </form >
    </div >
    <script type="text/javascript" src="/public/js/common.js" ></script >
    <script type="text/javascript" src="/public/js/content_addtop.js" ></script >
<script >
        $(".checkOaGame").click(function () {
            var url = $(this).attr('ahref');
            $.get(url, '', function (res) {
                var re = {};
                if (res.indexOf('msg') > 0) {
                    re = $.parseJSON(res);
                }
                if (typeof(re.msg) != 'undefined') {
                    yxalert(re.msg);
                } else {
                    alert(res);
                }
            })
        });
</script >
</body >
</html>