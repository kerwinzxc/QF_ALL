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
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Admin/User/index');?>" ><?php echo L('ADMIN_USER_INDEX');?></a ></li >
        <li ><a href="<?php echo U('Admin/User/add');?>" ><?php echo L('ADMIN_USER_ADD');?></a ></li >
    </ul >
    <?php $user_statuses=array("3"=>L('USER_STATUS_BLOCKED'),"2"=>L('USER_STATUS_ACTIVATED'),"1"=>L('USER_STATUS_UNVERIFIED')); ?>
    <form class="well form-search" method="post" action="<?php echo U('Admin/User/index');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                <span class="mr20" >
                        渠道类型：
						<select class="select_2" name="user_type" id="type_selected_id" >
                            <?php if(is_array($roles)): foreach($roles as $k=>$vo): $ut_select=$k==$user_type ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($ut_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >
                        ID：
                        <input type="text" class="input" name="user_id" value="<?php echo ($id); ?>" placeholder="用户ID" >

                        用户名：
						<select class="select_2" name="user_login" id="name_selected_id" >
                            <option value="0" >全部</option >
                            <?php if(is_array($agents)): foreach($agents as $k=>$vo): $ul_select=$k==$user_login ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($ul_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >
                        状态：
						<select name="user_status" id="statuses_selected_id" >
                            <option value="0" >全部</option >
                            <?php if(is_array($user_statuses)): foreach($user_statuses as $k=>$vo): $us_select=$k==$user_status ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($us_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >

                        <input type="submit" name="submit" class="btn btn-warning" value="搜索" />
						<input type="submit" name="submit" class="btn btn-primary" value="下载" />
					</span >
            </div >
        </div >
    </form >
    <table class="table table-hover table-bordered" >
        <thead >
        <tr >
            <th width="50" >ID</th >
            <th >渠道类型</th >
            <th ><?php echo L('USERNAME');?></th >
            <th >联系人</th >
            <th ><?php echo L('LAST_LOGIN_IP');?></th >
            <th ><?php echo L('LAST_LOGIN_TIME');?></th >
            <th ><?php echo L('EMAIL');?></th >
            <th >电话</th >
            <th >QQ</th >
            <th ><?php echo L('STATUS');?></th >
            <th width="120" ><?php echo L('ACTIONS');?></th >
        </tr >
        </thead >
        <tbody >

        <?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr >
                <td ><?php echo ($vo["id"]); ?></td >
                <td ><?php echo ($roles[$vo['user_type']]); ?></td >
                <td ><?php echo ($vo["user_login"]); ?></td >
                <td ><?php echo ($vo["linkman"]); ?></td >
                <td ><?php echo ($vo["last_login_ip"]); ?></td >
                <td >
                    <?php if($vo['last_login_time'] == 0): echo L('USER_HAVENOT_LOGIN');?>
                        <?php else: ?>
                        <?php echo ($vo["last_login_time"]); endif; ?>
                </td >
                <td ><?php echo ($vo["user_email"]); ?></td >
                <td ><?php echo ($vo["mobile"]); ?></td >
                <td ><?php echo ($vo["qq"]); ?></td >
                <td ><?php echo ($user_statuses[$vo['user_status']]); ?></td >
                <td >
                    <?php if($vo['id'] == 1): ?><font color="#cccccc" ><?php echo L('EDIT');?></font > | <font color="#cccccc" ><?php echo L('DELETE');?></font > |
                        <?php if($vo['user_status'] == 2): ?><font color="#cccccc" ><?php echo L('BLOCK_USER');?></font >
                            <?php else: ?>
                            <font color="#cccccc" ><?php echo L('ACTIVATE_USER');?></font ><?php endif; ?>
                        <?php else: ?>
                        <a href='<?php echo U("Admin/User/edit",array("id"=>$vo["id"]));?>' ><?php echo L('EDIT');?></a > |
                        <a class="js-ajax-delete"
                           href="<?php echo U('Admin/User/delete',array('id'=>$vo['id']));?>" ><?php echo L('DELETE');?></a > |
                        <?php if($vo['user_status'] == 2): ?><a href="<?php echo U('Admin/User/ban',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn"
                               data-msg="<?php echo L('BLOCK_USER_CONFIRM_MESSAGE');?>" ><?php echo L('BLOCK_USER');?></a >
                            <?php else: ?>
                            <a href="<?php echo U('Admin/User/cancelban',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn"
                               data-msg="<?php echo L('ACTIVATE_USER_CONFIRM_MESSAGE');?>" ><?php echo L('ACTIVATE_USER');?></a ><?php endif; endif; ?>
                </td >
            </tr ><?php endforeach; endif; ?>
        </tbody >
    </table >
    <div class="pagination" ><?php echo ($page); ?></div >
</div >
<script src="/public/js/common.js" ></script >
</body >
</html>