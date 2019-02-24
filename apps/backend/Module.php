<?php

namespace Ad\Backend;

use Ad\Backend\Lib\Tag;
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
                'Ad\Backend\Controllers' => __DIR__.'/controllers/',
                'Ad\Backend\Models'      => __DIR__.'/models/',
                'Ad\Backend\Plugins'     => __DIR__.'/plugins/',
                'Ad\Backend\Forms'     => __DIR__.'/forms/',
                'Ad\Backend\Lib'     => __DIR__.'/lib/',
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
        $di->set('view', function(){
            $view = new View();
            $view->setViewsDir(__DIR__.'/views/');
            $view->setPartialsDir(__DIR__.'/views/partials/');

            $view->registerEngines(array(
                '.volt' => function($view, $di) {
                    $volt = new Volt($view, $di);

                    $volt->setOptions(array(
                        'compiledPath' => dirname(__DIR__).'/data/volt/',
                        'stat' => true,
                        'compileAlways' => true
                    ));

                    $compiler = $volt->getCompiler();

                    $compiler->addFunction('get_class', 'get_class');
                    $compiler->addFunction('strrpos', 'strrpos');
                    $compiler->addFunction('substr', 'substr');
                    $compiler->addFunction('array_push', 'array_push');

                    return $volt;
                }
            ));

            return $view;
        });
        $di->set('tag', function()
        {
            return new Tag();
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
