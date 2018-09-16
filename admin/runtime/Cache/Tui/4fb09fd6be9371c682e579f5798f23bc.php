<?php if (!defined('THINK_PATH')) exit();?><html >
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
            <th >操作时间</th >
            <th >玩家账号</th >
            <th >适用游戏</th >
            <th >发放数量</th >
            <th >实际支付金额</th >
        </tr >
        <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                <td ><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td >
                <td ><?php echo ($vo["mem_name"]); ?></td >
                <td ><?php echo ($vo["game_name"]); ?></td >
                <td ><?php echo ($vo["coin_cnt"]); ?></td >
                <td ><?php echo ($vo["real_pay"]); ?></td >
            </tr ><?php endforeach; endif; else: echo "" ;endif; ?>
    </table >
</div >
<div class="container paging" >
    <?php echo ($page); ?>
</div >

</body >
</html >