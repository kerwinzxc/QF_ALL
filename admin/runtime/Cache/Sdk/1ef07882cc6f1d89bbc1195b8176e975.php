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
<style >
    .select2-container .select2-dropdown {
        z-index: 99999999;
    }
</style >

</head>
<body class="J_scroll_fixed" >
<div class="wrap js-check-wrap" >
    <ul class="nav nav-tabs" >
        <li class="active" ><a href="<?php echo U('Sdk/IosGame/index');?>" >游戏列表</a ></li >
        <li ><a href="<?php echo U('Sdk/IosGame/delindex');?>" >删除列表</a ></li >
    </ul >

    <form class="well form-search" method="get" action="<?php echo U('IosGame/index');?>" >
        <div class="search_type cc mb10" >
            <div class="mb10" >
					<span class="mr20" >
					    状态：
						<select class="select_2" name="status" id="selected_id_status" >
                            <?php if(is_array($gamestatues)): foreach($gamestatues as $k=>$vo): $g_select=$k==$formget['status'] ?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($g_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >
                    &nbsp;&nbsp;
						游戏名称：
                        <select class="select_2 js-example-basic-single" name="app_id" id="selected_id_app_id" >
                            <option value="0" >选择游戏</option >
                            <?php if(is_array($games)): foreach($games as $k=>$vo): $g_select=($k==$formget['app_id'] ?"selected":""); ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($g_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select >
                        &nbsp;&nbsp;					
						<input type="submit" name="submit" class="btn btn-primary" value="搜索" />
					</span >
            </div >
        </div >
    </form >

    <link rel="stylesheet" href="/public/admin/css/share.css" />
    <div class='funcs' >
        <a class='btn btn-success add_game_btn' href="javascript:;" >添加游戏</a >
    </div >

    <form class="js-ajax-form" action="" method="post" >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width=50 >游戏ID</th >
                <th width=50 >游戏公司</th >
                <th width=150 >游戏名称</th >
                <th width=50 >状态</th >
                <th width=100 >上线时间</th >
                <th width=150 >回调地址</th >
                <th width=150 >母包地址</th >
                <th width=120 >管理操作</th >
            </tr >
            </thead >
            <?php if(is_array($items)): foreach($items as $key=>$vo): ?><tr >
                    <td ><?php echo ($vo["id"]); ?></td >
                    <td >
                        <?php if($vo["company_name"] == null): ?><a href="javascript:bind_cp_box(<?php echo ($vo[id]); ?>);" class="bind_cp">绑定</a >
                            <?php else: ?>
                            <?php echo ($vo["company_name"]); endif; ?>
                    </td >
                    <td >
                        <?php if(!empty($vo["icon"])): ?><img src="<?php echo sp_get_asset_upload_path($vo[icon]);?>" onerror="imgnofind('/public/<?php echo ($vo[icon]); ?>')"
                                 width="40" /><?php endif; ?>
                        <?php echo ($vo["name"]); ?>
                    </td >
                    <td >
                        <?php echo ($gamestatues[$vo[status]]); ?>
                    </td >
                    <td >
                        <?php if($vo['status'] == 1 OR $vo['status'] == 3): ?><a href="<?php echo U('IosGame/set_status',array('id'=>$vo['id'],'status'=>2));?>"
                               class="js-ajax-dialog-btn" data-msg="确定上线游戏？" >上线游戏</a >
                            <?php else: ?>
                            <?php echo (date('Y-m-d H:i:s',$vo["run_time"])); ?><br />
                            <a href="<?php echo U('IosGame/set_status',array('id'=>$vo['id'],'status'=>3));?>"
                               class="js-ajax-dialog-btn" data-msg="确定下线游戏？" >下线游戏</a ><?php endif; ?>
                    </td >
                    <td style="word-wrap:break-word;word-break:break-all;" >
                        <?php if(empty($vo['cpurl'])): ?>暂无回调<br />
                            <a href="<?php echo U('IosGame/addurl',array('appid'=>$vo['id'],'from'=>'ios'));?>" >点击添加回调</a >
                            <?php else: ?>
                            <?php echo ($vo["cpurl"]); ?><br />
                            <a href="<?php echo U('IosGame/editurl',array('appid'=>$vo['id'],'from'=>'ios'));?>" >点击修改回调</a ><?php endif; ?>
                    </td >

                    <td style="word-wrap:break-word;word-break:break-all; " >
                        <?php if(empty($vo['packageurl'])): ?>暂无母包(<?php echo ($vo['initial']); ?>)
                            <br /><a href="<?php echo U('IosGame/addpackageurl',array('appid'=>$vo['id'],'from'=>'ios'));?>" >生成母包</a >
                            <?php else: ?>
                            <?php echo MOBILESITE;?>/mobile.php/Mobile/Game/sub?appid=<?php echo ($vo["id"]); ?>
                            <!--<?php echo DOWNIOSSITE;?>/<?php echo ($vo["packageurl"]); ?>-->
                            <a href="javascript:;"
                               class=" link_copy_btn "
                               data-clipboard-text="<?php echo MOBILESITE;?>/mobile.php/Mobile/Game/sub?appid=<?php echo ($vo["id"]); ?>"
                            >复制</a >
                            <!-- <a href="<?php echo U('IosGame/editpackageurl',array('appid'=>$vo['id']));?>">点击更新母包</a> --><?php endif; ?>
                    </td >

                    <td >
                        <a href="<?php echo U('IosGame/get_param',array('appid'=>$vo['id'],'from'=>'ios'));?>" >对接参数 </a >
                        |
                        <!--<a href="<?php echo U('Game/GamePayway/edit',array('appid'=>$vo['id']));?>" >支付配置 </a >
                        |-->
                        <a href="<?php echo U('Sdk/Game/edit',array('id'=>$vo['id'],'from'=>'ios'));?>" >编辑 </a >
                        <?php if (C('G_OA_EN')) { ?>   |
                        <a href="javascript:;" class="checkOaGame" ahref="<?php echo U('Sdk/Game/checkOaGame',array('id'=>$vo['id'],'from'=>'ios'));?>" >同步到oa </a >
                        <?php } ?>
                        <?php if($vo['status'] != 0): ?>|
                            <a href="<?php echo U('IosGame/delGame',array('id'=>$vo['id'],'from'=>'ios'));?>" class="js-ajax-delete" > 删除</a ><?php endif; ?>
                    </td >
                </tr ><?php endforeach; endif; ?>
        </table >
        <div class="pagination" ><?php echo ($Page); ?></div >

    </form >
</div >

<div class="pop_up_form_div container" id='add_game' style="display:none;" >
    <div class="row" >
        <div class="col-md-4" >游戏公司</div >
        <div class="col-md-8" >
            <select class="select_2 js-example-basic-single" name="cp_list"  >
                <?php if(is_array($cp_list)): foreach($cp_list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["company_name"]); ?></option ><?php endforeach; endif; ?>
            </select >
        </div >
    </div >
    <div class="row" >
        <div class="col-md-4" >游戏名称</div >
        <div class="col-md-8" >
            <input type="text" name="add_game_name" />
        </div >
    </div >
    <div class="row" >
        <div class="col-md-4" >当前状态</div >
        <div class="col-md-8" >
            <span class="label label-info" >接入中</span >

        </div >
    </div >
    <div class="row" style="margin-top:20px;" >
        <button class="btn btn-success pop_up_form_submit_btn" id='agent_submit_btn' >确认</button >
    </div >
</div >

<div class="pop_up_form_div container" id='bind-game-box' style="display:none;" >
    <div class="row" >
        <div class="col-md-4" >游戏公司</div >
        <div class="col-md-8" >
            <select class="select_2 js-example-basic-single" name="cp_bind_list"  >
                <?php if(is_array($cp_list)): foreach($cp_list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["company_name"]); ?></option ><?php endforeach; endif; ?>
            </select >
        </div >
    </div >
    <div class="row" style="margin-top:20px;" >
        <button class="btn btn-success pop_up_form_submit_btn" id='bind_submit_btn' onclick="javascript:bind_cp_submit();" >确认</button >
    </div >
</div >

<script >
    var current_game_id = 0;
    function bind_cp_box(game_id) {
        current_game_id = game_id;
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "绑定公司",
            content: $('#bind-game-box'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    }
    function bind_cp_submit() {
        var url = "<?php echo U('Core/Game/bind');?>";
        var cp_id = $("select[name='cp_bind_list']").val();
        var data = {"cp_id": cp_id, "game_id": current_game_id};
        $.post(url, data, function (res) {
            if ("0" == res.error) {
                yxalert(res.msg);
                reload_delay();
            } else if ("1" == res.error) {
                yxalert(res.msg);
            }
        })
    }
    $(".add_game_btn").click(function () {
        layer.open({
            type   : 1,
            shift  : 2,
            area   : '350px',
            title  : "添加游戏",
            content: $('#add_game'),
            cancel : function (index) {
                layer.close(index);
            }
        });
    });

    $("#agent_submit_btn").click(function () {
        var url  = "<?php echo U('Core/Game/add');?>";
        var name = $("input[name='add_game_name']").val();
        var cp_id    = $("select[name='cp_list']").val();
        var data = {"name": name, "classify": "4", "cp_id":cp_id};
        $.post(url, data, function (res) {
            if (res.error == "0") {
                yxalert(res.msg);
                reload_delay();
            } else if (res.error == "1") {
                yxalert(res.msg);
            }
        })
    });
    $(".checkOaGame").click(function () {
        var url      = $(this).attr('ahref');
        $.get(url, '', function(res) {
            var re={};
            if(res.indexOf('msg')>0){
                re=$.parseJSON(res);
            }
            if (typeof(re.msg) != 'undefined') {
                yxalert(re.msg);
            }else{
                alert(res);

            }
        })
    });
</script >

<script src="/public/js/common.js" ></script >

<script src="/public/share/clipboard/clipboard.min.js" ></script >
<script src="/public/share/clipboard/clipboard.js" ></script >
<link href="/public/share/clipboard/clipboard.css" rel="stylesheet" type="text/css" >

</body >
</html>