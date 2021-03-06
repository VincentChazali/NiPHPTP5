<?php
/**
 *
 * 应用（公共）配置文件
 *
 * @package   NiPHPCMS
 * @category  config\
 * @author    失眠小枕头 [levisun.mail@gmail.com]
 * @copyright Copyright (c) 2013, 失眠小枕头, All rights reserved.
 * @version   CVS: $Id: config.php v1.0.1 $
 * @link      http://www.NiPHP.com
 * @since     2016/10/22
 */
return [
    // 应用调试模式
    'app_debug'            => APP_DEBUG,
    // 应用Trace
    'app_trace'            => APP_DEBUG,
    // 默认时区
    'default_timezone'     => 'PRC',
    // URL设置
    'url_route_on'         => true,
    // URL伪静态后缀
    'url_html_suffix'      => 'shtml',
    // 路由使用完整匹配
    'route_complete_match' => true,
    // 域名路由
    'url_domain_deploy'    => true,
    // 路由配置文件（支持配置多个）
    'route_config_file'    => ['route'],
    // 是否开启请求缓存
    'request_cache'        => false,
    // 请求缓存有效期
    'request_cache_expire' => 1200,
    // 过滤方法
    'default_filter'       => 'trim,strip_tags,escape_xss',
    'content_filter'       => 'trim,escape_xss,htmlspecialchars',
    // 语言
    'lang_switch_on'       => true,
    'default_lang'         => 'zh-cn',
    // 默认模块名
    'default_module'       => 'index',
    // 禁止访问模块
    'deny_module_list'     => ['admin','common','home'],
    // 默认控制器名
    'default_controller'   => 'Index',
    // 默认操作名
    'default_action'       => 'index',
    // 操作方法前缀
    'use_action_prefix'    => false,
    // 操作方法后缀
    'action_suffix'        => '',

    // 模板设置
    'template' => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 视图基础目录，配置目录为所有模块的视图起始目录
        'view_base'    => '',
        // 当前模板的视图目录 留空为自动获取
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
        // 布局
        'layout_on'    => true,
        // 布局入口文件名
        'layout_name'  => 'layout',
        // 布局输出替换变量
        'layout_item'  => '{__CONTENT__}'
    ],
    // Trace设置
    'trace' => [
        'type' => 'Console',
    ],
    // 日志设置
    'log' => [
        'type'        => 'File',
        'path'        => LOG_PATH,
        'file_size'   => 2097152,
        'time_format' => 'c',
        // 'allow_key'   => ['125.76.163.60'],
        'apart_level' => [
            'error',
            'notice',
            'sql',
        ],
    ],
    // session设置
    'session' => [
        'id'             => '',
        'var_session_id' => '',
        'prefix'         => 'niphp_insomnia_',
        'type'           => '',
        'auto_start'     => true,
    ],
    // cookie设置
    'cookie' => [
        'prefix'    => 'niphp_insomnia_',
        'expire'    => 0,
        'path'      => '/',
        'domain'    => '',
        'secure'    => false,
        'httponly'  => '',
        'setcookie' => true,
    ],
    // 缓存设置
    'cache' => [
        'type'         => 'File',
        'cache_subdir' => false,
        'prefix'       => 'niphp_insomnia_',
        'expire'       => 1200,
    ],

    'http_exception_template' => [
        404 => ROOT_PATH . '404.html',
    ],
    // 'exception_tmpl' => ROOT_PATH . 'exception.html',
    // 验证码设置
    'captcha' => [
        'length'   => 4,
        'fontttf'  => '4.ttf',
        'fontSize' => 30,
    ],
    //分页配置
    'paginate' => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 20,
    ],
];
