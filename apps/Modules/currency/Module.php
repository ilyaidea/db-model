<?php
namespace Modules\Currency ;

use Phalcon\Events\Manager;
use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\View;

class Module implements ModuleDefinitionInterface
{

    /**
     * Registers an autoloader related to the module
     *
     * @param \Phalcon\DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Modules\Currency\Controllers' => MODULES_PATH.'/currency/controllers/',
            'Modules\Currency\Models'      => MODULES_PATH.'/currency/models/',
            'Modules\Currency\Plugins'     => MODULES_PATH.'/currency/plugins/',
            'Modules\Currency\Forms'     => MODULES_PATH.'/currency/forms/',
            'Modules\Currency\Lib'     => MODULES_PATH.'/currency/lib/',
        ])->register();
    }

    /**
     * Registers services related to the module
     *
     * @param \Phalcon\DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();

            $eventManager = new Manager();

            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace('Modules\Currency\Controllers\\');

            return $dispatcher;
        });
        $di->setShared('view',$this->setView($di));

    }
    private function setView($di)
    {
        $view = $di->getShared('view');

        $view->setViewsDir(__DIR__.'/views/');

        return $view;
    }

}