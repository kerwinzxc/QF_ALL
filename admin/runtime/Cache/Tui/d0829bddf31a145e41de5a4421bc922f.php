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
<div class="wrap jj" >
    <div class="common-form" >
        <ul class="nav nav-tabs" >
            <li ><a href="<?php echo U('Tui/Agent/man');?>" target="_self" >渠道列表</a ></li >
            <li class="active" ><a href="#" target="_self" >渠道详情</a ></li >
        </ul >
        <table class="table table-bordered table-hover" style="width:800px;" >
            <tr >
                <th >渠道账号</th >
                <th >状态</th >
                <th >渠道名称</th >
                <th >创建时间</th >

                <th >父渠道</th >
            </tr >
            <tr >
                <td ><?php echo ($data["user_login"]); ?></td >
                <td ><?php echo ($data["user_status_txt"]); ?></td >
                <td ><?php echo ($data["agent_name"]); ?></td >
                <td ><?php echo ($data["create_time"]); ?></td >

                <td >

                    <?php echo ($data["parent_agent_name"]); ?>
                    <?php if($data["ownerid"] != '1'): ?><button class='btn btn-success edit_parent_btn' >修改父渠道</button ><?php endif; ?>
                </td >
            </tr >
        </table >

        <style >
            #edit_form input[disabled='disabled'] {
                background-color: #FFFFFF;
                border-bottom: 1px solid #CCCCCC;
            }
        </style >
        <table class="table table-bordered table-hover" id="edit_form" style="width:800px;" >
            <tr >
                <td >联系人</td >
                <td ><input type="text" name="link_man" value="<?php echo ($data["link_man"]); ?>" /></td >
                <td >
                    <button >修改</button >
                </td >
            </tr >
            <tr >
                <td >电话</td >
                <td ><input type="text" name="mobile" value="<?php echo ($data["mobile"]); ?>" /></td >
                <td >
                    <button >修改</button >
                </td >
            </tr >
            <tr >
                <td >QQ</td >
                <td >
                    <input type="text" name="qq" value="<?php echo ($data["qq"]); ?>" />
                </td >
                <td >
                    <button >修改</button >
                </td >
            </tr >
            <tr >
                <td >登陆密码</td >
                <td >
                    <input type="password" name="loginpwd" />
                </td >
                <td >
                    <button >修改</button >
                </td >
            </tr >
            <tr >
                <td >支付密码</td >
                <td >
                    <input type="password" name="paypwd" />
                </td >
                <td >
                    <button >修改</button >
                </td >
            </tr >
        </table >

        登陆记录
        <table class="table table-bordered table-hover" style="width:800px;" >
            <tr >
                <th >后台登陆时间</th >
                <th >登陆IP</th >
            </tr >
            <?php if(is_array($login_items)): $i = 0; $__LIST__ = $login_items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                    <td ><?php echo (date("Y-m-d H:i:s",$vo["login_time"])); ?></td >
                    <td ><?php echo ($vo["login_ip"]); ?></td >
                </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
        </table >
        <div class="pagination" ><?php echo ($login_page); ?></div >
    </div >
</div >

<style >
    .funcs {
        padding: 0 0 10px 0;
    }

    .pop_up_form_div {
        width: 300px;
        padding: 20px 20px 40px 20px;
    }

    .pop_up_form_div .row {
        width: 300px;
        margin: 0;
        padding: 0;
    }

    .pop_up_form_div input[type='text'], .pop_up_form_div input[type='password'] {
        width: 280px;
    }

    .pop_up_form_submit_btn {
        width: 300px;
    }

    input[disabled='disabled'] {
        background-color: #FFFFFF;
        border-bottom: 1px solid #CCCCCC;
    }

</style >

<div class="pop_up_form_div container" id='give_agent' style="display:none;" >
    <form id='popup_form' method='post' onsubmit='return false;' >
        <div class="row" >
            <div class="col-md-4" >选择渠道</div >
            <div class="col-md-8" >
                <?php echo ($agent_select); ?>
            </div >
        </div >

        <div class="row" >
            <button class="btn btn-success pop_up_form_submit_btn" data-agentid="<?php echo ($data["id"]); ?>" id='agent_submit_btn'
                    style="margin-top:20px;" >确认
            </button >
        </div >
    </form >
</div >

<script src="/public/js/common.js" ></script >
<script >
    var agent_id = "<?php echo ($data["id"]); ?>";
    $("#edit_form input").attr("disabled", "disabled");
    $("#edit_form button").click(function () {
        var se        = $(this).parent("td").prev("td").children("input");
        var prev_attr = se.attr("disabled");
        if (prev_attr === "disabled") {
            se.removeAttr("disabled");
        } else {
            var value = se.val();
            var name  = se.attr("name");

            var url  = "<?php echo U('Tui/Agent/editinfo_post');?>";
            var data = {"name": name, "value": value, "agent_id": agent_id};
            $.post(url, data, function (res) {
                if (res.error === '0') {
                    yxalert("修改成功");
                    reload_delay();
                } else if (res.error === '1') {
                    yxalert(res.msg);
                }
            });
        }

    });

    $(".edit_parent_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "修改父渠道",
            content: $('#give_agent'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $("#agent_submit_btn").click(function () {
        var agent_id = $(this).attr("data-agentid");
        var owner_id = $(".pop_up_form_div select").val();
//            alert(agent_id+" "+owner_id);
        var data     = {"agent_id": agent_id, "ownerid": owner_id};
        var url      = "<?php echo U('Tui/Agent/change_parent_agent');?>";
        $.post(url, data, function (res) {
            if (res.error === '0') {
                yxalert("修改成功");
                reload_delay();
            } else if (res.error === '1') {
                yxalert(res.msg);
            }
        });
    });
</script >
</body >
</html>