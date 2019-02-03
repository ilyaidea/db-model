<?php

error_reporting(E_ALL);

use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
     */
    protected function registerServices()
    {

        $di = new FactoryDefault();

        $loader = new Loader();

        /**
         * We're a registering a set of directories taken from the configuration file
         */
        $loader
            ->registerDirs([__DIR__ . '/../apps/library/'])
            ->register();

        // Registering a router
        $di->set('router', function () {

            $router = new Router();

          $router->setDefaultModule("backend");

            $router->add('/:controller/:action', [
                'module'     => 'backend',
                'controller' => 1,
                'action'     => 2,
            ])->setName('backend');


            return $router;
        });

        $this->setDI($di);
    }

    public function main()
    {

        $this->registerServices();

        // Register the installed modules
        $this->registerModules([
            'frontend' => [
                'className' => 'Ad\Frontend\Module',
                'path'      => '../apps/frontend/Module.php'
            ],
            'backend'  => [
                'className' => 'Ad\Backend\Module',
                'path'      => '../apps/backend/Module.php'
            ]
        ]);

        echo $this->handle()->getContent();
    }
}

$application = new Application();
$application->main();
