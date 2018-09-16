<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head >
    <title >title</title >
    <script src="/public/agent/js/jquery-1.7.2.min.js" ></script >
    <link rel="stylesheet" href="/public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/public/3rd/bootstrap/css/bootstrap.min.css" />
    <script src="/public/3rd/bootstrap/js/bootstrap.min.js" ></script >

    <link rel="stylesheet" href="/public/share/paging.css" />

</head >
<body >
<div class="container" style="margin-top:20px;" >
    <table class="table table-hover table-bordered" >
        <tr >
            <th >时间</th >
            <th >来源</th >
            <th >数量</th >
        </tr >
        <tr style="color:red;" >
            <td >汇总</td >
            <td >--</td >
            <td ><?php echo ($total_income); ?></td >
        </tr >
        <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                <td ><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td >
                <td ><?php echo ($vo["from"]); ?></td >
                <td ><?php echo ($vo["coin_cnt"]); ?></td >
            </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
    </table >
</div >
<div class="container paging" >
    <?php echo ($page); ?>
</div >

</body >
</html >