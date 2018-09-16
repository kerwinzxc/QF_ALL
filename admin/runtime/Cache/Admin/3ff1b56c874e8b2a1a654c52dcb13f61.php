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
        <li ><a href="<?php echo U('Admin/CompanyInfo/edit');?>" >公司信息管理</a ></li >
    </ul >
    <form action="<?php echo U('Admin/CompanyInfo/edit_post');?>" method="post" class="form-horizontal js-ajax-forms"
          enctype="multipart/form-data" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr >
                        <th width="80" >公司名称</th >
                        <td >
                            <input type="text" name="COMPANY_NAME" value="<?php echo ($info["COMPANY_NAME"]); ?>" />
                        </td >
                    </tr >
                    <!--<tr >
                        <th width="80" >公司地址</th >
                        <td >
                            <input type="text" name="COMPANY_ADDR" value="<?php echo ($info["COMPANY_ADDR"]); ?>" />
                        </td >
                    </tr >
                    <tr >
                        <th width="80" >公司电话</th >
                        <td >
                            <input type="text" name="COMPANY_PHONE" value="<?php echo ($info["COMPANY_PHONE"]); ?>" />
                        </td >
                    </tr >-->
                    <tr >
                        <th width="80" >ICP备案信息</th >
                        <td >
                            <input type="text" name="WEB_ICP" value="<?php echo ($info["WEB_ICP"]); ?>" />
                        </td >
                    </tr >
                    <tr >
                        <th width="80" >版权信息</th >
                        <td >
                            <input type="text" name="COPYRIGHT" value="<?php echo ($info["COPYRIGHT"]); ?>" />
                        </td >
                    </tr >
                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >修改</button >
        </div >
    </form >
</div >
<script type="text/javascript" src="/public/js/common.js" ></script >

</body >
</html>