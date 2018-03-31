<?php
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

class App extends Application
{
    protected $config;
    function __construct(){
        define('ROOT_PATH', dirname(__DIR__));
        define('__APP__', ROOT_PATH.'/app/');
        $this->config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php"); 

        include_once __APP__.'/help/help.php';
    }
    /**
     * 初始化操作
     */
    protected function _init()
    {

        $di = new FactoryDefault();

        $loader = new Loader();

        $loader->registerNamespaces([
                // 'App\Backend\Plugins'     => '../app/backend/plugins/',
                'App\Library'     => '../app/library/',
        ]);

        /**
         * We're a registering a set of directories taken from the configuration file
         */
        $loader
            ->registerDirs([
                __DIR__ . '/../app/library/',
                ])
            ->register();

        //注册路由
        $di->set('router', function () {

            $router = new Router();
            $router->setDefaultModule("frontend");

            $router->add("/admin", [
                'module'     => 'backend',
                'controller' => 'index',
                'action'     => 'index',
            ])->setName('backend-index');

            $router->add('/:controller/:action/:params', [
                'module'     => 'frontend',
                'controller' => 1,
                'action'     => 2,
                'params'    =>  3,
            ])->setName('frontend');

            $router->add("/admin/:controller/:action/:params", [
                'module'     => 'backend',
                'controller' => 1,
                'action'     => 2,
                'params'    =>  3,
            ])->setName('backend');

            // 设置404路由
            $router->notFound([
                'controller' => 'index',
                'action' => 'index'
            ]);  

            return $router;
        });

        //设置 baseUri
        $di->set('url', function(){
            $url = new Url();
            // dump($url);
            $this->config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php"); 
            $url->setBaseUri( $this->config->baseUri );
            return $url;
        });

        
        //设置数据库
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

        //实例化session并且开始 赋值给DI实例 方便在控制器中调用
        $di->setShared('session', function() {
            $session = new Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        });

        $this->setDI($di);
    }

    public function main()
    {
        //调用
        $this->_init();

        // Register the installed modules
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

        echo $this->handle()->getContent();
    }
}

// $application = new App();
// $application->main();

//异常捕获
try {
    $application = new App();
    $application->main();
    
} catch(\Exception $e) {

    echo '<div style="border:1px solid #ccc;background:#FAFAFA;padding:5px 20px;z-index:1000;margin:5px;"><pre>';
    echo get_class($e), ": <strong>", $e->getMessage(), "</strong><br><br>";
    echo " File = <strong> ", $e->getFile(), " </strong> <br><br>";
    echo " Line = <strong> ", $e->getLine(), " </strong> <br><br>";
    echo $e->getTraceAsString();
    echo '</pre></div>';

    $log = array(
        'file' => $e -> getFile(),
        'line' => $e -> getLine(),
        'code' => $e -> getCode(),
        'msg' => $e -> getMessage(),
        'trace' => $e -> getTraceAsString(),
    );

    $date = date('Ymd');
    $logger = new \Phalcon\Logger\Adapter\File(ROOT_PATH."/app/cache/logs/crash_{$date}.log");
    $logger -> error( json_encode($log)."\n" );

}
