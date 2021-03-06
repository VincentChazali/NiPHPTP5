<?php
/**
 *
 * 路由配置文件
 *
 * @package   NiPHPCMS
 * @category  config\extra
 * @author    失眠小枕头 [levisun.mail@gmail.com]
 * @copyright Copyright (c) 2013, 失眠小枕头, All rights reserved.
 * @version   CVS: $Id: route.php v1.0.1 $
 * @link      http://www.NiPHP.com
 * @since     2016/10/22
 */
return [
    // 全局变量规则定义
    '__pattern__' => [
        'method' => '\w+',
        'cid'    => '\d+',
        'id'     => '\d+',
    ],

    '__domain__' => [
        'admin' => 'admin',
        'my'    => 'member',
    ],

    // '__miss__' => 'index',

    '/' => 'index',

    // website
    'list/:cid'           => 'index/entry/index',
    'article/:cid/:id'    => 'index/article/index',
    'tags/:id'            => 'index/tags/index',
    'jump/:cid/:id'       => 'index/jump/index',
    'wechat'              => 'wechat/index/index',

    // comment
    'comment/:cid'        => 'index/comment/index',
    'comment/added'       => 'index/comment/added',

    // member
    'login'               => 'member/index/login',
    'login/oauth/:type'   => 'member/index/oauth',
    'logout'              => 'member/index/logout',
    'reg'                 => 'member/index/reg',
    'forget'              => 'member/index/forget',

    'my'                  => 'member/index/index',
    'my/setup'            => 'member/setup/bases',
    'my/setup/bases'      => 'member/setup/bases',
    'my/setup/portrait'   => 'member/setup/portrait',
    'my/setup/password'   => 'member/setup/password',

    'my/article'          => 'member/article/feedback',
    'my/article/feedback' => 'member/article/feedback',
    'my/article/message'  => 'member/article/message',
    'my/article/common'   => 'member/article/common',

    'my/collect'          => 'member/collect/article',
    'my/collect/article'  => 'member/collect/article',
    'my/collect/goods'    => 'member/collect/goods',

    // mall
    'mall'                => 'mall/index/index',
    'mall/list/:cid'      => 'mall/entry/index',
    'mall/item/:cid/:id'  => 'mall/item/index',
    'mall/order/:id'      => 'mall/order/index',
    'mall/respond/:type'  => 'mall/order/respond',
    'mall/notify/:type'   => 'mall/order/notify',
    'mall/cart'           => 'mall/cart/index',
    'mall/shop/:id'       => 'mall/shop/index',
];
