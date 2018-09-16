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
<script type="text/html" id="photos-item-wrapper" >
    <li id="savedimage{id}" >
        <input id="photo-{id}" type="hidden" name="photos_url[]" value="{filepath}" >
        <input id="photo-{id}-name" type="text" name="photos_alt[]" value="{name}" style="width: 160px;" title="图片名称" >
        <img id="photo-{id}-preview" src="{url}" style="height:36px;width: 36px;"
             onclick="javascript:image_priview(this.src)" />
        <a href="javascript:upload_one_image('图片上传','#photo-{id}');" >替换</a >
        <a href="javascript:(function(){$('#savedimage{id}').remove();})();" >移除</a >
    </li >
</script >
</head>
<body >
<div class="wrap js-check-wrap" >
    <form action="<?php echo U('Admin/slide/edit_post');?>" method="post" class="form-horizontal js-ajax-forms"
          enctype="multipart/form-data" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr >
                        <th width="80" >分类</th >
                        <td >
                            <select name="slide_cid" >
                                <option value="0" >默认分类</option >
                                <?php if(is_array($categorys)): foreach($categorys as $key=>$vo): $cid_selected=$slide_cid==$vo['cid']?"selected":""; ?>
                                    <option value="<?php echo ($vo["cid"]); ?>" <?php echo ($cid_selected); ?> ><?php echo ($vo["cat_name"]); ?></option ><?php endforeach; endif; ?>
                            </select >
                        </td >
                    </tr >
                    <tr >
                        <th width="80" >游戏</th >
                        <td ><select class="select_2" name="app_id" id="selected_id" >
                            <?php if(is_array($games)): foreach($games as $k=>$vo): $pt_select=$k==$target_id?"selected":""; ?>
                                <option value="<?php echo ($k); ?>" <?php echo ($pt_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                        </select > <input type="hidden" name="id" value="<?php echo ($id); ?>" /></td >
                    </tr >
                    <tr >
                        <th width="80" >标题</th >
                        <td >
                            <input type="text" style="width: 400px;" name="slide_name" value="<?php echo ($slide_name); ?>"
                                   placeholder="请输入幻灯片名称" />
                            <span class="form-required" >*</span >
                            <input type="hidden" name="slide_id" value="<?php echo ($slide_id); ?>" />
                        </td >
                    </tr >
                    <!--<tr >
                        <th width="80" >链接：</th >
                        <td ><input type="text" name="slide_url" value="<?php echo ($slide_url); ?>" style="width: 400px" ></td >
                    </tr >
                    <tr>
                        <th width="80">描述</th>
                        <td><input type="text" name="slide_des" value="<?php echo ($slide_des); ?>" style="width: 400px"></td>
                    </tr>-->
                    <tr>
                        <th width="80">幻灯片描述</th>
                        <td><textarea name="slide_content" id="description" style="width: 98%; height: 200px;"><?php echo ($slide_content); ?></textarea></td>
                    </tr>
                </table >
            </div >
            <div class="span3" >
                <table class="table table-bordered" >
                    <tr >
                        <td ><b >缩略图 (推荐尺寸 720*300)</b ></td >
                    </tr >
                    <tr >
                        <td >
                            <div style="text-align: center;" >
                                <input type="hidden" name="slide_pic" id="thumb" value="<?php echo ((isset($slide_pic) && ($slide_pic !== ""))?($slide_pic):''); ?>" >
                                <a href="javascript:upload_one_image('图片上传','#thumb');" >
                                    <?php if(empty($slide_pic)): ?><img src="/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                             width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="<?php echo ($slide_pic); ?>" id="thumb-preview"
                                             width="135" style="cursor: hand" /><?php endif; ?>
                                </a >
                                <input type="button" class="btn btn-small"
                                       onclick="$('#thumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                       value="取消图片" >
                            </div >
                        </td >
                    </tr >
                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >提交</button >
            <a class="btn" href="<?php echo U('Admin/slide/index');?>" >返回</a >
        </div >
    </form >
</div >
<script type="text/javascript" src="/public/js/common.js" ></script >
<script type="text/javascript" src="/public/js/content_addtop.js" ></script >
<script type="text/javascript" >
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
                    content   : "您确定需要关闭当前页面嘛？",
                    ok        : function () {
                        setCookie("refersh_time", 1);
                        window.close();
                        return true;
                    }
                });
            });
        });
        /////---------------------
        Wind.use('validate', 'ajaxForm', 'artDialog', function () {
            //javascript

            var form = $('form.js-ajax-forms');
            //ie处理placeholder提交问题
            if ($.browser.msie) {
                form.find('[placeholder]').each(function () {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            }
            //表单验证开始
            form.validate({
                //是否在获取焦点时验证
                onfocusout   : false,
                //是否在敲击键盘时验证
                onkeyup      : false,
                //当鼠标掉级时验证
                onclick      : false,
                //验证错误
                showErrors   : function (errorMap, errorArr) {
                    //errorMap {'name':'错误信息'}
                    //errorArr [{'message':'错误信息',element:({})}]
                    try {
                        $(errorArr[0].element).focus();
                        art.dialog({
                            id        : 'error',
                            icon      : 'error',
                            lock      : true,
                            fixed     : true,
                            background: "#CCCCCC",
                            opacity   : 0,
                            content   : errorArr[0].message,
                            cancelVal : '确定',
                            cancel    : function () {
                                $(errorArr[0].element).focus();
                            }
                        });
                    } catch (err) {
                    }
                },
                //验证规则
                rules        : {
                    'slide_name': {
                        required: 1
                    }
                },
                //验证未通过提示消息
                messages     : {
                    'slide_name': {
                        required: '请输入名称'
                    }
                },
                //给未通过验证的元素加效果,闪烁等
                highlight    : false,
                //是否在获取焦点时验证
                onfocusout   : false,
                //验证通过，提交表单
                submitHandler: function (forms) {
                    $(forms).ajaxSubmit({
                        url         : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                        dataType    : 'json',
                        beforeSubmit: function (arr, $form, options) {

                        },
                        success     : function (data, statusText, xhr, $form) {
                            if (data.status) {
                                setCookie("refersh_time", 1);
                                //添加成功
                                Wind.use("artDialog", function () {
                                    art.dialog({
                                        id        : "succeed",
                                        icon      : "succeed",
                                        fixed     : true,
                                        lock      : true,
                                        background: "#CCCCCC",
                                        opacity   : 0,
                                        content   : data.info,
                                        button    : [{
                                            name    : '继续编辑？',
                                            callback: function () {
                                                reloadPage(window);
                                                return true;
                                            },
                                            focus   : true
                                        }, {
                                            name    : '返回列表',
                                            callback: function () {
                                                location.href = "<?php echo U('Admin/slide/index');?>";
                                                return true;
                                            }
                                        }]
                                    });
                                });
                            } else {
                                isalert(data.info);
                            }
                        }
                    });
                }
            });
        });
        ////-------------------------
    });
</script >
</body >
</html>