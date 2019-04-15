<?php

error_reporting(E_ALL);

use Phalcon\DI\FactoryDefault;


    define('BASE_PATH', dirname(__DIR__));
    define('APP_PATH', BASE_PATH . '/apps');
    define('MODULES_PATH', APP_PATH.'/modules');
    define( 'PROJECT_NAME', basename( BASE_PATH ) );

//    dump( APP_PATH.'/modules/currency/Module.php');
    $di = new FactoryDefault();

    include APP_PATH . '/config/loader.php';

    include APP_PATH . "/config/services.php";

    include APP_PATH . "/config/routes.php";

    $config = $di->getConfig();


    $application = new \Phalcon\Mvc\Application($di);

// Register the installed modules
$application->registerModules([
             'currency' => [
                 'className' => 'Modules\Currency\Module',
                 'path'      => APP_PATH.'/modules/currency/Module.php'
             ],
            'backend'  => [
                'className' => 'Modules\Backend\Module',
                'path'      => APP_PATH.'/modules/backend/Module.php'
            ]
        ]);
    echo $application->handle()->getContent();


    function dump($value)
    {
        if(is_array($value) || is_object($value))
        {
            print_r($value);
        }
        else{
            print $value;
        }

        die;
    }
