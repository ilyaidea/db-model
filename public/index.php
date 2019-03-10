<?php

error_reporting(E_ALL);

use Phalcon\DI\FactoryDefault;


    define('BASE_PATH', dirname(__DIR__));
    define('APP_PATH', BASE_PATH . '/app');
    define( 'PROJECT_NAME', basename( BASE_PATH ) );

    $di = new FactoryDefault();

    include APP_PATH . '/config/loader.php';

    include APP_PATH . "/config/services.php";

    $config = $di->getConfig();


    $application = new \Phalcon\Mvc\Application($di);

// Register the installed modules
$application->registerModules([
            'backend'  => [
                'className' => 'Backend\Module',
                'path'      => APP_PATH.'/backend/Module.php'
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

//    $application = new Application();
//    $application->main();
