<?php

$di->setShared('config',function () {
    $config = include APP_PATH . '/config/config.php';

    return $config;
}
);

$config = $di->getShared('config');


// Registering the view component
$di->set('view', function(){
    $view = new \Phalcon\Mvc\View();
    $view->setViewsDir(APP_PATH.'/backend/views/');
    $view->setPartialsDir(APP_PATH.'/backend/views/partials/');

    $view->registerEngines(array(
        '.volt' => function($view, $di) {
            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

            $volt->setOptions(array(
                'compiledPath' => APP_PATH.'/data/volt/',
                'stat' => true,
                'compileAlways' => true
            ));

            return $volt;
        }
    ));

    return $view;
});


$di->set('tag', function()
{
    return new Phalcon\Tag();
});

$di->set('db', function ()use ($config) {

    return new \Phalcon\Db\Adapter\Pdo\Mysql([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ]);
});

// Set a different connection in each module
date_default_timezone_set('Asia/Tehran');


//set url
$di->setShared('url', function () use ($config){

    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});



/**
 * Loading routes from the routes.php file
 */
$di->set('router', function () {
    return require APP_PATH . '/config/routes.php';
});

/**
 * Flash service with custom CSS classes
 */
$di->set('flash', function () {
    return new \Phalcon\Flash\Direct([
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});