<?php
return [
    'view_replace_str' => [
    '__PUBLIC__'=>SITE_URL.'/public/static/admin',
    "__PUBLICI__"=>SITE_URL.'/public/static/index',
    '__ROOT__'=>SITE_URL.'/public/index.php/admin',   
    ],
     'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
       // "expire"        =>"36000",
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],
];
