<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'app',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展函数文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,
    // 全局请求缓存排除规则
    'request_cache_except'   => [],

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
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
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
    'captcha'  => [
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码字体大小(px)
        'fontSize' => 25,
        // 是否画混淆曲线
        'useCurve' => false,
        // 验证码图片高度
        'imageH'   => 50,
        // 验证码图片宽度
        'imageW'   => 150,
        // 验证码位数
        'length'   => 3,
        // 验证成功后是否重置
        'reset'    => true
    ],
    'alipay_config'=>[
        //应用ID,您的APPID。
        'app_id' => "2016092200571757",

        //商户私钥
        'merchant_private_key' => "MIIEowIBAAKCAQEA3icxQUed/PhWI+4Hir0K4+ZBi34cbGYFp/FyD8Ymd4Bag0iOjCX7Pv33XeeAMRvV5TnrGYGHKaYyQBb63K0A7fAIHdd3lCAxQnemsRT28GA3q97rfJNze2ZeZzfybZ3rDypIeLJD1G4PZC+NFVD31CGznq4tPDfafOCHCAkN+Fio/Qsx0+fl5dKSR9W9tn/CT8BZ3mf6/N4NTwP5wJY23gkDseHoVYhQKzaJdxSkSxZOXxJvr7qgTYVdktRAnPc8hZW2nfKU7l3hiJ6pALxntr2APPy9YFaUR8SiilzQyo1g3su7yOKl8wpDucHBm+03CiTDuzjf2cfzPaN8+DzGHwIDAQABAoIBAGdru4R2gNh6DDAh6iTuqRk74pu8FCNqw4tR3hX124aanIityJ76N6M1vGldEtLJ8KQMeKShJnl/Q7mOeS8u41Xh/wVVf/fXnNciuNmLtwJk6MX8u4h9ZK+4Eo7e/t+FOx8OQjreUrGco1GyyW15CkcZgXOIBssX/YFRTcux220Xiz/FTlJthjb4CBVTHBCGBUormRYJI1ocE0cJGr1J6z9Frg4X/UJGlG4UNJJeVgT7kWnXcK3i0ftOMayfBiyir0U5oRxivKKT8B4SWyv/W1Ye4nBt5EvTqAItTdR8AfFT8yLKVuHpYWu7eHzs+jyIDvnglu4W24uscwFRIlRBZnECgYEA9bn8L7kWPOMq3CVXB0eOn4RUt7yX7she9Yi4U96jv/rLq6y/02lRlduGPZwmQAGh8gVpmydMAbZSmUFEylJ5HTWdSVUSiHf/M0oJsuMUXZtVNKO+RRSn/Y+ETjRuw47Rp//bLMJzIm/qqn8iOpddP3Ugjpo7B0GRihdTXDSN/TMCgYEA53DmlMJux2W2q+/jm4CYYXiykxDCy6dE5nHdeub1kIC5oeTC78zRMcoJUOsZ0Zb87J/uyZSRui2bvjQNiK+tXNm4o1ZeYxxECvHaeeny0qpu61Re1cl+DvFlzV1h1vN9hsWwJ4yM2mnkvpBymAnLsjmlPCNGkBg0Rhhmaqhum2UCgYA+tJtaQk0edIn3a7/tp6EJq+dCi+npkVBKL/15yZLX5tQalxbMiE+9giubhUFti/0bma39XeXTegdR/InlZ25oucnNcNwt3xFMsVQQRkpoKL9xk2d2kXLdDcahflfVp5hw2qW/ok9nNlAX+iFt+jpdezI3sbvmeiD9sD4hhXfGaQKBgQDXy/KDlENckp9f895i2OW8RKEk9UTcRQu+Xz8m4IDpis0LgdStaWlJJlvHYl8BiOot6/XnaSrz0KDeGYThBQT9hVhenCKIAQwEtHuEnzm1agrgTBvc9PIgFr9YXBDlLsXFS0Czr56J7KDHesIOt1uBw7Qova+Gnbrn/MpJ+uCe7QKBgGFjl0+K0C/SjesmNaaHnIEf2JKRhBHNAcE7ERuriIcTcr4zkogtJ60TS6GL7nD26IxPtRtjKjl61PDTzvNYA1qX/CfrTElrIJ56YTNYtF92KxoNeFOuXB2EQr1R7AUJ0Wnyz99CQ3h9osYumvfY1ZQxs3pfifOtVM2k6RE+Xx50",

        //异步通知地址
        'notify_url' => "http://120.79.10.54/index.php/order/notifysuccess",

        //同步跳转
        'return_url' => "http://120.79.10.54/index.php/order/paysuccess",

        //编码格式
        'charset' => "UTF-8",

        //签名方式
        'sign_type'=>"RSA2",

        //支付宝网关
        'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAu5aVhRYWNl4G7SwpGeY75oQ+AEGHEWyjBBklrVVPlCqYcKBMMBgVyClKUkUNRY8FfXbld2Fl+wJEK+K2FVQm+ZS5ZqmaZV1erGfPMVlZhO5Xh4qAiPqQxRp9iDaQr7/POOx+fNngKC1raLcPAGxrh/7eT1/D1IMHk/g7LOYGa9Vq0gtFQmS2ROsfO79Qw0oGfG9CXEGFLxC2WVCKD6/V1jHrnaZ2prZc6jrDOeo73hl2BKaGzXlY+No9qdMvH9gt7xkGb8vZYhHPUgoSwMefljUcdpPhyUhvDVHBhHxtohGHYQ7+JewkK7T9yhzEN6HjizO+NwayS2KTCuHiAB6lkQIDAQAB",
    ]
];
