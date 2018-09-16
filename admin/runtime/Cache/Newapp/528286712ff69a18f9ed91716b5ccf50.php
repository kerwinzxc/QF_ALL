<?php if (!defined('THINK_PATH')) exit();?><!--
 @time 2017-1-19 11:13:14
 @author 严旭
-->

<!doctype html>
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
    #content, .edui-editor {
        z-index: 1 !important;
    }

    #calroot {
        z-index: 9999999 !important;
    }
</style >
</head>
<body >
    <div class="wrap" >
        <ul class="nav nav-tabs" >
            <li ><a href="<?php echo U('Newapp/gametest/index');?>" >开测列表</a ></li >
            <li class="active" ><a href="<?php echo U('Newapp/gametest/add');?>" >添加</a ></li >
        </ul >
        <form action="<?php echo U('Newapp/gametest/addPost');?>" method="post" class="form-horizontal js-ajax-form" >
            <div class="row-fluid" >
                <div class="span9" >
                    <table class="table table-bordered" >
                        <tr >
                            <th width="80" >选择游戏</th >
                            <td >
                                <?php echo ($app_select); ?>
                            </td >
                        </tr >
                        <tr >
                            <th width="80" >开测时间</th >
                            <td >
                                <input type='text' name='start_time' class='form-control js-datetime' />
                            </td >
                        </tr >
                        <tr >
                            <th width="80" >开测状态</th >
                            <td >
                                <input type='radio' name='status' value='1' checked="checked" />删档内测                                
                                <input type='radio' name='status' value='2' />不删档内测
                            </td >
                        </tr >
                        <tr >
                            <th width="80" >开测描述</th >
                            <td >
                                <!--<script type="text/plain" id="content" name="testdesc"></script>-->
                                <textarea name="testdesc" style='width:100%;height:200px;' > </textarea >
                            </td >
                        </tr >
                    </table >
                </div >
            </div >
            <div class="form-actions" >
                <button class="btn btn-primary js-ajax-submit" type="submit" ><?php echo L("ADD");?></button >
                <a class="btn" href="<?php echo U('Newapp/gametest/index');?>" ><?php echo L('BACK');?></a >
            </div >
        </form >
    </div >
    <script type="text/javascript" src="/public/js/common.js" ></script >
    <script type="text/javascript" src="/public/js/content_addtop.js" ></script >
    <!--    <script type="text/javascript">
        //编辑器路径定义
        var editorURL = GV.DIMAUB;
        </script>
        <script type="text/javascript" src="/public/js/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js"></script>
        <script>
            var editorcontent = new baidu.editor.ui.Editor();
            editorcontent.render('content');
        </script>-->
</body >
</html>