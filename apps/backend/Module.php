<?php

namespace Ad\Backend;

use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Volt ;

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
                'Ad\Backend\Controllers' => '../apps/backend/controllers/',
                'Ad\Backend\Models'      => '../apps/backend/models/',
                'Ad\Backend\Plugins'     => '../apps/backend/plugins/',
                'Ad\Backend\Forms'     => '../apps/backend/forms/',
                'Ad\Backend\Lib'     => '../apps/backend/lib/',
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
            $dispatcher->setDefaultNamespace('Ad\Backend\Controllers\\');
            return $dispatcher;
        });

        // Registering the view component
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir('../apps/backend/views/');

            $view->registerEngines(
                [
                    ".volt" => Volt::class,
                ]
            );
            return $view;
        });

        // Set a different connection in each module
        date_default_timezone_set('Asia/Tehran');
        $di->set('db', function () {
            $tz = 'Asia/Tehran';
            $charset = 'utf8mb4';
            return new Mysql(
                [
                    "host" => "localhost",
                    "username" => "root",
                    "password" => "",
                    "dbname" => "ad",
                    'charset'  => 'utf8mb4',
                    'prefix'   => 'ilya_',

                ]
            );
        });
    }
}
