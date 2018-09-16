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
<style >
    .funcs {
        padding: 0 0 10px 0;
    }

    .add_agent_form_div .row {
        width: 300px;
        margin: 0;
        padding: 0;
    }

    .add_agent_form_div input {
        width: 280px;
    }

    .add_agent_form_btn {
        width: 300px;
    }
</style >
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Tui/Agent/man');?>" target="_self" >渠道列表</a ></li >
        <!--<li><a href="<?php echo U('Agent/Agent/add');?>" target="_self">添加渠道</a></li>-->
    </ul >

    <form class="well form-search" method="get" action='/admin.php/Tui/Agent/man/menuid/267.html' >
        <div class="search_type cc mb10" >
            <div class="mb10" >
                    <span class="mr20" >
<!--                        渠道类型： 
                        <select class="select_2" name="roleid" id="selected_id">
                            <?php if(is_array($roles)): foreach($roles as $k=>$vo): $r_select=$k==$roleid ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>"<?php echo ($r_select); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                        </select>
                        &nbsp;&nbsp;-->
                        父渠道：
                        <input type="text" name="parent_agent_name" style="width: 200px;"
                               value="<?php echo ($formget["parent_agent_name"]); ?>" placeholder="请输入父渠道..." >
                        &nbsp;&nbsp; 
                        渠道名称：
                        <input type="text" name="agent_name" style="width: 200px;" value="<?php echo ($formget["agent_name"]); ?>"
                               placeholder="请输入渠道名称..." >
                        帐号：
                        <input type="text" name="user_login" style="width: 200px;" value="<?php echo ($formget["user_login"]); ?>"
                               placeholder="请输入帐号..." >
                        
                        <br /><br />
                        
                        等级：
                        <?php echo ($agent_level_select); ?>
                        状态:
                        <select class="select_2" name="status" >
                            <option value="0" >选择状态</option >
                            <option value="2" >正常</option >
                            <option value="3" >禁用</option >
                        </select >
                        &nbsp;&nbsp;
                        <input type="submit" class="btn btn-primary" value="搜索" />
                    </span >
            </div >
        </div >
    </form >
    <div class='funcs' >
        <a class='btn btn-success add_agent_btn' href="javascript:;" >创建一级渠道</a >
    </div >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >

                <th width="50" >父渠道</th >
                <th width="50" >渠道名称</th >
                <th width="50" >账号</th >
                <th width="50" >等级</th >
                <th width="50" >创建时间</th >
                <th width="50" >状态</th >
                <th width="60" >操作</th >
                <!--<th width="50">备注</th>-->
            </tr >
            </thead >
            <?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["parent_agent_name"]); ?></td >
                    <td ><?php echo ($vo["agent_name"]); ?></td >
                    <td ><?php echo ($vo["user_login"]); ?></td >
                    <td ><?php echo ($vo["user_type_txt"]); ?></td >

                    <td ><?php echo ($vo["create_time"]); ?></td >
                    <td ><?php echo ($vo["user_status_txt"]); ?></td >
                    <td >
                        <a href="<?php echo U('Tui/Agent/detail','','');?>/agent_id/<?php echo ($vo["id"]); ?>" >详情</a >
                        <a href="<?php echo U('Tui/Agent/ban','','');?>/agent_id/<?php echo ($vo["id"]); ?>" >冻结</a >
                        <a href="<?php echo U('Tui/Agent/unban','','');?>/agent_id/<?php echo ($vo["id"]); ?>" >解冻</a >
                        <!--                            <?php switch($vo["user_status"]): case "1": ?><a href="<?php echo U('Tui/Agent/pass',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定要设为审核通过吗？设为通过后，将发送短信通知用户" >通过</a> |
                                                            <a href="<?php echo U('Tui/Agent/notpass',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn"  data-msg="确定要设为审核不通过吗？" >不通过</a><?php break;?>
                                                        <?php case "2": ?><a href="<?php echo U('Tui/Agent/notpass',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn"  data-msg="确定要设为审核不通过吗？" >不通过</a><?php break;?>
                                                        <?php case "3": ?><a href="<?php echo U('Tui/Agent/pass',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定要设为审核通过吗？设为通过后，将发送短信通知用户" >通过</a><?php break; endswitch;?>-->
                    </td >
                    <!--<td><?php echo ($vo["remark"]); ?></td>-->
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >
    </form >
    <style >
        .input_hint {
            color: #333333;
        }
    </style >
    <div class="add_agent_form_div container"
         style="display:none;width:300px;padding-top:20px;padding-left:10px;padding-right:10px;" >
        <form id='add_agent_form' method='post' onsubmit='return false;' >
            <div class="row" >
                <div class="col-md-4" >渠道名称 <span class="input_hint" >( 必填 ) </span ></div >
                <div class="col-md-8" >
                    <input type="text" name="user_nicename" />
                </div >
            </div >
            <div class="row" >
                <div class="col-md-4" >帐号 <span class="input_hint" >( 必填，建议填写手机号 )</span ></div >
                <div class="col-md-8" >
                    <input type="text" name="user_login" />
                </div >
            </div >
            <div class="row" >
                <div class="col-md-4" >密码 <span class="input_hint" >( 必填 )</span ></div >
                <div class="col-md-8" >
                    <input type="password" name="user_pass" />
                </div >
            </div >
            <!--            <div class="row">
                            <div class="col-md-4">备注 <span class="input_hint">( 选填，如联系方式、注意事项等 )</span></div>
                            <div class="col-md-8">
                                <input type="text" name="remark" />
                            </div>
                        </div>-->
            <div class="row" >
                <button class="btn btn-success add_agent_form_btn" >添加</button >
            </div >
        </form >
    </div >
</div >
<script src="/public/js/common.js" ></script >
<script >
    $(".add_agent_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : ['400px', '400px'],
            title  : "添加一级渠道", //不显示标题
            content: $('.add_agent_form_div'), //捕获的元素
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $(".add_agent_form_btn").click(function () {
//            var user_pass=$("input[name='user_pass']").val();
//            var user_login=$("input[name='user_login']").val();
//            var user_nicename=$("input[name='user_nicename']").val();
//            
//            var data={"user_pass":user_pass,"user_login":user_login,"user_nicename":user_nicename};
        var url  = "<?php echo U('Tui/Agent/addagent_post');?>";
        var data = $("#add_agent_form").serialize();
        $.post(url, data, function (data) {
            yxalert(data.msg);

            if (data.error === '0') {
                reload_delay();
            }
        });
    });
</script >
</body >
</html>