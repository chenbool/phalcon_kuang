<?php
namespace App\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\DiInterface;
use Phalcon\Events\Manager;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Config\Adapter\Php as ConfigPhp;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                'App\Frontend\Controllers'  => '../app/frontend/controllers/',
                'App\Frontend\Models'       => '../app/frontend/models/',
                'App\Frontend\Plugins'      => '../app/frontend/plugins/',
                'App\Frontend\Plugins\Sms'      => '../app/frontend/plugins/sms',
                'App\Frontend\Validations'  => '../app/frontend/validations/',
                'App\Frontend\Repositories' => '../app/frontend/repositories/',
            ]
        );

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();

            $eventManager = new Manager();

            // Attach a event listener to the dispatcher (if any)
            // For example:
            // $eventManager->attach('dispatch', new \My\Awesome\Acl('frontend'));

            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace('App\Frontend\Controllers\\');
            return $dispatcher;
        });

        // Registering the view component
        $di->set('view', function () {
            $config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php"); 
            // dd( $config['theme'] );
            
            $view = new View();
            $view->setViewsDir('../app/frontend/views/'.$config['theme']);
            
            $view->registerEngines(array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            ));
        
            return $view;
        });

    }
}
