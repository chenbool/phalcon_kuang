<?php
/**
 * 应用入口文件
 * 初始化 Phalcon 应用程序
 */

// 开启错误显示
ini_set('display_errors','On');
error_reporting(E_ALL);

use Phalcon\Loader;
use Phalcon\Mvc\Url,
    Phalcon\Mvc\Router,
    Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Config\Adapter\Php as ConfigPhp;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * 应用程序主类
 * 继承 Phalcon\Mvc\Application，负责应用初始化和请求处理
 */
class App extends Application
{
    /**
     * 配置对象
     * @var ConfigPhp
     */
    protected $config;

    /**
     * 构造函数
     * 初始化应用根路径和配置
     */
    function __construct(){
        // 定义应用根目录
        define('ROOT_PATH', dirname(__DIR__));
        // 定义应用目录路径
        define('__APP__', ROOT_PATH.'/app/');
        // 加载配置文件
        $this->config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php");

        // 引入辅助函数
        include_once __APP__.'/help/help.php';
    }

    /**
     * 初始化操作
     * 配置依赖注入容器、加载器、路由、数据库等
     */
    protected function _init()
    {
        // 创建依赖注入容器
        $di = new FactoryDefault();

        // 创建加载器
        $loader = new Loader();

        // 注册命名空间
        $loader->registerNamespaces([
            'App\Library'     => '../app/library/',
        ]);

        // 注册目录
        $loader
            ->registerDirs([
                __DIR__ . '/../app/library/',
            ])
            ->register();

        // 注册路由
        $di->set('router', function () {
            $router = new Router();
            $router->setDefaultModule("frontend");

            // 后台首页路由
            $router->add("/admin", [
                'module'     => 'backend',
                'controller' => 'index',
                'action'     => 'index',
            ])->setName('backend-index');

            // 前台默认路由
            $router->add("/:controller/:action/:params", [
                'module'     => 'frontend',
                'controller' => 1,
                'action'     => 2,
                'params'    =>  3,
            ])->setName('frontend');

            // 后台管理路由
            $router->add("/admin/:controller/:action/:params", [
                'module'     => 'backend',
                'controller' => 1,
                'action'     => 2,
                'params'    =>  3,
            ])->setName('backend');

            // 404 路由
            $router->notFound([
                'controller' => 'index',
                'action' => 'index'
            ]);

            return $router;
        });

        // 设置基础 URL
        $di->set('url', function(){
            $url = new Url();
            $this->config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php");
            $url->setBaseUri( $this->config->baseUri );
            return $url;
        });

        // 设置数据库连接
        $database = $this->config->database;
        $di->set('db', function ()use($database) {
            return new Mysql([
                "host"      => $database['host'],
                "username"  => $database['username'],
                "password"  => $database['password'],
                "dbname"    => $database['dbname'],
                "charset"   => $database['charset']
            ]);
        });

        // 初始化 Session 并注册到 DI
        $di->setShared('session', function() {
            $session = new Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        });

        // 设置 DI 容器
        $this->setDI($di);
    }

    /**
     * 主方法
     * 启动应用并处理请求
     */
    public function main()
    {
        // 调用初始化
        $this->_init();

        // 注册模块
        $this->registerModules([
            'frontend' => [
                'className' => 'App\Frontend\Module',
                'path'      => ROOT_PATH.'/app/frontend/Module.php'
            ],
            'backend'  => [
                'className' => 'App\Backend\Module',
                'path'      => ROOT_PATH.'/app/backend/Module.php'
            ]
        ]);

        // 处理请求并输出内容
        echo $this->handle()->getContent();
    }
}

// 异常捕获处理
try {
    $application = new App();
    $application->main();

} catch(\Exception $e) {
    // 输出错误信息
    echo '<div style="border:1px solid #ccc;background:#FAFAFA;padding:5px 20px;z-index:1000;margin:5px;"><pre>';
    echo get_class($e), ": <strong>", $e->getMessage(), "</strong><br><br>";
    echo " File = <strong> ", $e->getFile(), " </strong> <br><br>";
    echo " Line = <strong> ", $e->getLine(), " </strong> <br><br>";
    echo $e->getTraceAsString();
    echo '</pre></div>';

    // 记录错误日志
    $log = array(
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'code' => $e->getCode(),
        'msg'  => $e->getMessage(),
        'trace' => $e->getTraceAsString(),
    );

    // 按日期生成日志文件名
    $date = date('Ymd');
    $logger = new \Phalcon\Logger\Adapter\File(ROOT_PATH."/app/cache/logs/crash_{$date}.log");
    $logger->error( json_encode($log)."\n" );
}
