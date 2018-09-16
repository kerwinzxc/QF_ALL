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
<!-- 公用样式 -->

<link href="/public/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/public/bootstrap-fileinput/js/fileinput.js" type="text/javascript" ></script >
<script src="/public/bootstrap-fileinput/js/fileinput_locale_zh.js" type="text/javascript" ></script >
<script src="/public/bootstrap-fileinput/js/fileinput_locale_es.js" type="text/javascript" ></script >

</head>
<body >
<div class="wrap" >
    <ul class="nav nav-tabs" >
        <li ><a href="<?php echo U('Newapp/Gametype/index');?>" >游戏类型</a ></li >
        <li ><a href="<?php echo U('Newapp/Gametype/add');?>" >添加游戏类型</a ></li >
        <li class="active" ><a href="<?php echo U('Newapp/Gametype/edit');?>" >编辑游戏类型</a ></li >
    </ul >
    <form enctype="multipart/form-data" class="form-horizontal js-ajax-form" action="<?php echo U('Newapp/Gametype/edit_post');?>"
          method="post" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <input type="hidden" name="gt_id" id="gt_id" value="<?php echo ($id); ?>" >
                    <tr >
                        <th >上级类型名称</th >
                        <td >
                            <select name="parentid" >
                                <option value="0" >作为一级类型</option >
                                <?php echo ($select_categorys); ?>
                            </select >
                        </td >
                    </tr >
                    <tr >
                        <th >游戏类型名称</th >
                        <td >
                            <input type="text" name="gt_name" id="gt_name" value="<?php echo ($name); ?>" placeholder="" >
                        </td >
                    </tr >
                    <tr >
                        <th ><b >图片</b >(推荐200*111)</th >
                        <td >
                               <div style="text-align: center;" >
                                <input type="hidden" name="gt_image" id="thumb"
                                       value="<?php echo sp_get_asset_upload_path($image);?>" >
                                <a href="javascript:upload_one_image('图片上传','#thumb');" >
                                    <?php if(empty($image)): ?><img src="/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                             width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="<?php echo sp_get_asset_upload_path($image);?>" id="thumb-preview"
                                             width="135" style="cursor: hand" /><?php endif; ?>
                                </a >
                                <input type="button" class="btn btn-small"
                                       onclick="$('#thumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                       value="取消图片" >
                            </div >
                        </td >
                    </tr >
                    <tr >
                        <th >状态</th >
                        <td >
                            <?php if( 2 == $status): ?><label class="radio" ><input type="radio" name="gt_status" value="2"
                                                             checked >显示</label >
                                <label class="radio" ><input type="radio" name="gt_status" value="1" >隐藏</label >
                                <?php else: ?>
                                <label class="radio" ><input type="radio" name="gt_status" value="2" >显示</label >
                                <label class="radio" ><input type="radio" name="gt_status" value="1"
                                                             checked >隐藏</label ><?php endif; ?>
                        </td >
                    </tr >

                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >修改</button >
            <a class="btn" href="<?php echo U('Newapp/Gametype/index');?>" >返回</a >
        </div >
    </form >
</div >
<script src="/public/js/common.js" ></script >
<script type="text/javascript"
        src="/public/js/content_addtop.js?t=<?php echo time();?>" ></script >
<script >
    $(function () {
        $(".js-ajax-close-btn").on('click', function (e) {
            e.preventDefault();
            Wind.use("artDialog", function () {
                art.dialog({
                    id        : "question",
                    icon      : "question",
                    fixed     : true,
                    lock      : true,
                    background: "#CCCCCC",
                    opacity   : 0,
                    content   : "您确定需要关闭当前页面吗？",
                    ok        : function () {
                        setCookie('refersh_time_admin_menu_index', 1);
                        window.close();
                        return true;
                    }
                });
            });
        });
    });
</script >
</body >
</html>