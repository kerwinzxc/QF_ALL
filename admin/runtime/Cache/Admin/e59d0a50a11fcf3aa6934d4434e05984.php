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
        <li class="active" ><a href="<?php echo U('Admin/SlideMultiImage/index',array('cat_name'=>$catname));?>" ><?php echo L('ADMIN_SLIDE_INDEX');?></a ></li >
        <?php if($addshow != 0): ?><li ><a href="<?php echo U('Admin/SlideMultiImage/add',array('cat_name'=>$catname));?>" ><?php echo L('ADMIN_SLIDE_ADD');?></a ></li ><?php endif; ?>
    </ul >
    <!--<form class="well form-search" method="post" id="cid-form" >
        <select class="select_2" name="cid" id="selected-cid" >
            <?php if(is_array($categorys)): foreach($categorys as $key=>$vo): $cid_select=$vo['cid']===$slide_cid?"selected":""; ?>
                <option value="<?php echo ($vo["cid"]); ?>" <?php echo ($cid_select); ?> ><?php echo ($vo["cat_name"]); ?></option ><?php endforeach; endif; ?>
        </select >
    </form >-->
    <form class="js-ajax-form" method="post" >
        <div class="table-actions" >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Admin/SlideMultiImage/listorders');?>" ><?php echo L('SORT');?>
            </button >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Admin/SlideMultiImage/toggle',array('display'=>1));?>" data-subcheck="true" ><?php echo L('DISPLAY');?>
            </button >
            <!--<button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Admin/SlideMultiImage/toggle',array('hide'=>1));?>" data-subcheck="true" ><?php echo L('HIDDEN');?>
            </button >
            <button class="btn btn-primary btn-small js-ajax-submit" type="submit"
                    data-action="<?php echo U('Admin/SlideMultiImage/delete');?>" data-subcheck="true" ><?php echo L('DELETE');?>
            </button >-->
        </div >
        <table class="table table-hover table-bordered table-list" >
            <thead >
            <tr >
                <th width="15" >
                    <label >
                        <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x" >
                    </label >
                </th >
                <th ><?php echo L('SORT');?></th >
                <th >所属分类</th >
                <th >标题</th >
                <th >跳转目标</th >
                <th >图片</th >
                <!--<th ><?php echo L('STATUS');?></th >-->
                <th ><?php echo L('ACTIONS');?></th >
            </tr >
            </thead >
            <?php if(is_array($slides)): foreach($slides as $key=>$vo): ?><tr >
                    <td ><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x"
                                name="ids[]" value="<?php echo ($vo["slide_id"]); ?>" ></td >
                    <td ><input name='listorders[<?php echo ($vo["slide_id"]); ?>]' class="input input-order mr5" type='text' size='3'
                                value='<?php echo ($vo["listorder"]); ?>' ></td >
                    <td ><?php echo ($vo["cat_name"]); ?></td >
                    <td ><?php echo ($vo["slide_name"]); ?></td >
                    <td ><?php echo ($vo["target_object"]); ?></td >
                    <td >
                        <img src="<?php echo ($vo['slide_pic']); ?>" style="height:100px;" alt="" />
                        <!--                        <?php if(!empty($vo['slide_pic'])): ?><a href="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" target="_blank"><?php echo L('VIEW');?></a><?php endif; ?>-->
                    </td >
                    <!--<td ><?php echo ($status[$vo['slide_status']]); ?></td >-->
                    <td >
                        <a href="<?php echo U('Admin/SlideMultiImage/edit',array('id'=>$vo['slide_id'],'cat_name'=>$catname));?>" ><?php echo L('EDIT');?></a >
                        <?php if($addshow != 0): ?><a href="<?php echo U('Admin/SlideMultiImage/delete',array('id'=>$vo['slide_id']));?>"
                           class="js-ajax-delete" ><?php echo L('DELETE');?></a ><?php endif; ?>
                        <!--<?php if($vo['slide_status'] == 1): ?><a href="<?php echo U('Admin/SlideMultiImage/cancelban',array('id'=>$vo['slide_id']));?>"
                               class="js-ajax-dialog-btn" data-msg="确定显示此幻灯片吗？" ><?php echo L('DISPLAY');?></a >
                            <?php else: ?>
                            <a href="<?php echo U('Admin/SlideMultiImage/ban',array('id'=>$vo['slide_id']));?>"
                               class="js-ajax-dialog-btn"
                               data-msg="确定隐藏此幻灯片吗？" ><?php echo L('HIDE');?></a ><?php endif; ?>-->
                    </td >
                </tr ><?php endforeach; endif; ?>
        </table >
    </form >
</div >
<script src="/public/js/common.js" ></script >
<script >
    setCookie('refersh_time', 0);
    function refersh_window() {
        var refersh_time = getCookie('refersh_time');
        if (refersh_time == 1) {
            window.location.reload();
        }
    }
    setInterval(function () {
        refersh_window()
    }, 3000);
    $(function () {
        $("#selected-cid").change(function () {
            $("#cid-form").submit();
        });
    });
</script >
</body >
</html>