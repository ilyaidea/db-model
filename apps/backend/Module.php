<?php
namespace Backend;

use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;

class Module implements ModuleDefinitionInterface
{

    /**
     * Registers an autoloader related to the module
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(
            [
                'Backend\Controllers' => __DIR__ . '/controllers/',
                'Backend\Models' => __DIR__ . '/models/',
            ]
        );

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param \Phalcon\DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set(
            'dispatcher',
            function () {
                $dispatcher = new Dispatcher();

                $dispatcher->setDefaultNamespace('Backend\Controllers\\');

                return $dispatcher;
            }
        );

        $view = $di->get('view');

        $di->setShared('view',$this->setView($di));

    }
    private function setView($di)
    {
        $view = $di->getShared('view');

        $view->setViewsDir(__DIR__.'/views/');

        return $view;
    }
}

