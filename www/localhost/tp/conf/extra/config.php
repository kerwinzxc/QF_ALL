<?php
return [
    /* 玩家密钥 */
    "HSAUTHCODE"          => 'dfadsferf54dfsgdfhbnTW4fagfg',
    /* CP加密密钥 */
    "CPAUTHCODE"          => 'fasdfdfer',
    "CURRENCY_NAME"       => '清风币',
    //cookies
    "COOKIEKEY"           => 'fqerqeqr54_',
    "HUOAPP"              => [
        'APP_APPID'     => 100,
        'IOS_APP_APPID' => 101,
    ],
    'wallet'              => [
        // 使用 ptb平台币 gm 清风币 ptbgm 平台币清风币共存
        'type'       => 'gm',
        // 人民币与币比例
        'rate'       => 1,
        //sdk充值是否参与折扣返利
        'sdkbenifit' => true,
        //清风币充值是否参与折扣返利
        'gmbenifit'  => true,
    ],
    'G_SPREAD_EN'         => '1', //  1 有推广  0 无推广
    'G_APP_EN'            => '1', //0 无APP  1 有APP
    'G_DISCONT_TYPE'      => '3', //  0 无折扣 无返利 1 折扣功能  2 返利功能 3 有折扣有返利
    'G_FIRST_EN'          => '1',     //0 表示未开通首充功能  1 表示开通首充功能
    'G_WITHDRAW_EN'       => '1',     //0 表示未开通结算功能  1 开通结算功能
    'G_SYSTEM_TYPE'       => '3',     //1 ANDROID  2 IOS 3 ANDROID && IOS
    'G_DEFAULT_EN'        => '1',     //未设定折扣渠道是否有收益，1有，0无
    'G_ADD_RATE'          => 0.05,     //未设定折扣时增加的比率
    // 默认输出类型
    'default_return_type' => 'html',
    // 平台类型
    "brand_name"          => "游戏平台",
    // 公司品牌
    "company_brand"       => "清风游戏",
    // 游戏开服商
    "developers"          => "##",
];