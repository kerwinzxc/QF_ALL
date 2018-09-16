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
<style type="text/css" >
    .pic-list li {
        margin-bottom: 5px;
    }
</style >
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
    <ul class="nav nav-tabs" >
        <li ><a href="<?php echo U('Newapp/News/index');?>" >资讯列表</a ></li >
        <li ><a href="<?php echo U('Newapp/News/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>"
                target="_self" >添加资讯</a ></li >
        <li class="active" ><a href="#" >资讯编辑</a ></li >
    </ul >
    <form action="<?php echo U('Newapp/News/edit_post');?>" method="post" class="form-horizontal js-ajax-forms"
          enctype="multipart/form-data" >
        <input type="hidden" name="post[id]" value="<?php echo ($post[id]); ?>" >
        <div class="row-fluid" >
            <div class="span9" >
                <table class="table table-bordered" >
                    <tr >
                        <th >序号</th >
                        <td >
                            <?php echo ($post[id]); ?>
                        </td >
                    </tr >
                    <!-- 			<tr>
                                    <th>游戏ID</th>
                                    <td><input type="text" name="post[app_id]" id="source" value="<?php echo ($post[app_id]); ?>" placeholder="请输入游戏ID">
                                    </td>
                                </tr> -->
                    <tr >
                        <th >游戏名称</th >
                        <td >
                            <select class="select_2" name="post[app_id]" id="source" >
                                <?php if(is_array($games)): foreach($games as $k=>$vo): $pt_select=$k==$post[app_id] ?"selected":""; ?>
                                    <option value="<?php echo ($k); ?>" <?php echo ($pt_select); ?> ><?php echo ($vo); ?></option ><?php endforeach; endif; ?>
                            </select >
                            <!-- <input type="text" name="gamename" value="<?php echo ($gamename); ?>"> -->
                        </td >
                    </tr >

                    <tr >
                        <th width="80" >资讯类型</th >
                        <td >
                            <?php if(is_array($ptypes)): foreach($ptypes as $k=>$vo): $pt_select=$k==$post['post_type'] ?"checked":""; ?>
                                <label class="radio inline" for="active_true" >
                                    <input type="radio" name="post[post_type]" value="<?php echo ($k); ?>" <?php echo ($pt_select); ?>
                                           id="post[post_type]" /><?php echo ($vo); ?>
                                </label ><?php endforeach; endif; ?>
                        </td >
                    </tr >
                    <tr >
                        <th >标题</th >
                        <td >
                            <input type="text" style="width:400px;" name="post[post_title]" id="title" required
                                   value="<?php echo ($post[post_title]); ?>" placeholder="请输入标题" />
                            <span class="form-required" >*</span >
                        </td >
                    </tr >
                    <!-- 			<tr>
                                    <th>关键词</th>
                                    <td><input type="text" name="post[post_keywords]" id="keywords" value="<?php echo ($post[post_keywords]); ?>" style="width: 400px" placeholder="请输入关键字"> 多关键词之间用空格或者英文逗号隔开</td>
                                </tr> -->
                    <tr >
                        <th >内容</th >
                        <td >
                            <script type="text/plain" id="content" name="post[post_content]" ><?php echo ($post[post_content]); ?>
                            </script >
                        </td >
                    </tr >
                </table >
            </div >
            <div class="span3" >
                <table class="table table-bordered" >
                    <tr >
                        <th ><b >缩略图360*90</b ></th >
                    </tr >
                    <tr >
                        <td >
                            <div style="text-align: center;" >
                                <input type="hidden" name="smeta[thumb]" id="thumb" value="<?php echo ((isset($smeta["thumb"]) && ($smeta["thumb"] !== ""))?($smeta["thumb"]):''); ?>" >
                                <a href="javascript:upload_one_image('图片上传','#thumb');" >
                                    <?php if(empty($smeta['thumb'])): ?><img src="/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                             width="135" style="cursor: hand" />
                                        <?php else: ?>
                                        <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" id="thumb-preview"
                                             width="135" style="cursor: hand" /><?php endif; ?>
                                </a >
                                <input type="button" class="btn btn-small"
                                       onclick="$('#thumb-preview').attr('src','/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                       value="取消图片" >
                            </div >
                        </td >
                    </tr >
                    <!-- 			<tr>
                                    <th><b>作者: <?php echo ($post["post_author"]); ?></th>
                                </tr> -->
                    <tr >
                        <th ><b >发布时间</b ></th >
                    </tr >
                    <tr >
                        <td ><input type="text" name="post[post_modified]" value="<?php echo ($post["post_modified"]); ?>"
                                    class="js-datetime" style="width: 160px;" ></td >
                    </tr >
                    <tr >
                        <th ><b >状态</b ></th >
                    </tr >
                    <tr >
                        <td >
                            <label class="radio" ><input type="radio" name="post[post_status]" value="2"
                                                         checked >审核通过</label >
                            <label class="radio" ><input type="radio" name="post[post_status]" value="1" >待审核</label >
                        </td >
                    </tr >

                    
                </table >
            </div >
        </div >
        <div class="form-actions" >
            <button class="btn btn-primary js-ajax-submit" type="submit" >提交</button >
            <a class="btn" href="<?php echo U('Newapp/News/index');?>" >返回</a >
        </div >
    </form >
</div >
<script type="text/javascript" src="/public/js/common.js" ></script >
<script type="text/javascript" src="/public/js/content_addtop.js" ></script >
<script type="text/javascript" >
    //编辑器路径定义
    var editorURL = GV.DIMAUB;
</script >
<script type="text/javascript" src="/public/js/ueditor/ueditor.config.js" ></script >
<script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js" ></script >
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

            //编辑器
            editorcontent = new baidu.editor.ui.Editor();
            editorcontent.render('content');
            try {
                editorcontent.sync();
            } catch (err) {
            }
            //增加编辑器验证规则
            jQuery.validator.addMethod('editorcontent', function () {
                try {
                    editorcontent.sync();
                } catch (err) {
                }
                return editorcontent.hasContents();
            });
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

            var formloading = false;
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
                    'post[post_title]'  : {
                        required: 1
                    },
                    'post[post_content]': {
                        editorcontent: true
                    }
                },
                //验证未通过提示消息
                messages     : {
                    'post[post_title]'  : {
                        required: '请输入标题'
                    },
                    'post[post_content]': {
                        editorcontent: '内容不能为空'
                    }
                },
                //给未通过验证的元素加效果,闪烁等
                highlight    : false,
                //是否在获取焦点时验证
                onfocusout   : false,
                //验证通过，提交表单
                submitHandler: function (forms) {
                    if (formloading)
                        return;
                    $(forms).ajaxSubmit({
                        url         : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                        dataType    : 'json',
                        beforeSubmit: function (arr, $form, options) {
                            formloading = true;
                        },
                        success     : function (data, statusText, xhr, $form) {
                            formloading = false;
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
                                            name    : '继续添加？',
                                            callback: function () {
                                                reloadPage(window);
                                                return true;
                                            },
                                            focus   : true
                                        }, {
                                            name    : '返回列表页',
                                            callback: function () {
                                                location = "<?php echo U('Newapp/News/index');?>";
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