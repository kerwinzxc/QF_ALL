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
<div class="wrap" >
    <ul class="nav nav-tabs" >
        <li ><a href="<?php echo U('Admin/User/index');?>" ><?php echo L('ADMIN_USER_INDEX');?></a ></li >
        <li class="active" ><a href="<?php echo U('Admin/User/add');?>" ><?php echo L('ADMIN_USER_ADD');?></a ></li >
    </ul >
    <form method="post" class="form-horizontal js-ajax-form" action="<?php echo U('Admin/User/add_post');?>" >
        <fieldset >
            <div class="control-group" >
                <label class="control-label" >账号:</label >
                <div class="controls" >
                    <input type="text" class="input" name="user_login" placeholder="输入渠道账号" >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >密码:</label >
                <div class="controls" >
                    <input type="password" class="input" name="user_pass" value="" placeholder="输入密码" >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >渠道名称:</label >
                <div class="controls" >
                    <input type="text" class="input" name="user_nicename" placeholder="输入渠道名称" >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >CP名称:</label >
                <div class="controls" >
                    <select name="cp_id">
                        <option value="0">请选择</option>
                        <?php if(is_array($cp_list)): foreach($cp_list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["company_name"]); ?></option ><?php endforeach; endif; ?>
                    </select>
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >联系人:</label >
                <div class="controls" >
                    <input type="text" class="input" name="linkman" placeholder="输入联系人" >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >QQ:</label >
                <div class="controls" >
                    <input type="text" class="input" name="qq" placeholder="输入QQ" >
                </div >
            </div >

            <div class="control-group" >
                <label class="control-label" >手机:</label >
                <div class="controls" >
                    <input type="text" class="input" name="mobile" placeholder="输入手机号码" >
                </div >
            </div >
            <div class="control-group" >
                <label class="control-label" >角色:</label >
                <div class="controls" >
                    <?php if(is_array($roles)): foreach($roles as $k=>$vo): ?><label class="checkbox inline" >
                            <input value="<?php echo ($k); ?>" type="radio" name="role_id" checked ><?php echo ($vo); ?>
                        </label ><?php endforeach; endif; ?>
                </div >
            </div >
        </fieldset >
        <div class="form-actions" >
            <button type="submit" class="btn btn-primary js-ajax-submit" ><?php echo L('ADD');?></button >
            <a class="btn" href="<?php echo U('Admin/User/index');?>" ><?php echo L('BACK');?></a >
        </div >
    </form >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>