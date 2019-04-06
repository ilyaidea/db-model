<?php

$di->setShared('config',function () {
    $config = include APP_PATH . '/config/config.php';

    return $config;
}
);

$config = $di->getShared('config');
$di->set('url', function() use ($config)
{
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri($config->application->baseUri);
    $url->setStaticBaseUri($config->application->baseUri);
    $url->setBasePath($config->application->baseUri);
    return $url;
});


// Registering the view component
$di->setShared('view', function(){
    $view = new \Lib\Mvc\View();
    $view->setViewsDir(APP_PATH.'/backend/views/');
    $view->setLayoutsDir(BASE_PATH. '/public/theme/layouts/');
    $view->setPartialsDir(BASE_PATH.'/public/theme/partials/');
    $view->setMainView(BASE_PATH. '/public/theme/theme');
    $view->setLayout('main');

    $event = new \Phalcon\Events\Manager();
    $event->attach('view:beforeRender', function(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view, $viewEnginePath) {
        new \Lib\Events\BeforeRender($event, $view, $viewEnginePath);
    });
    $event->attach('view:afterRender', function(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view) {
        new \Lib\Events\AfterRender($event, $view);
    });
    $event->attach('view:afterRenderView', function(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view) {
        new \Lib\Events\AfterRenderView($event, $view);
    });
    $event->attach('view:beforeRenderView', function(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view, $viewEnginePath) {
        new \Lib\Events\BeforeRenderView($event, $view, $viewEnginePath);
    });
    $event->attach('view:notFoundView', function(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view, $viewEnginePath) {
        new \Lib\Events\NotFoundView($event, $view, $viewEnginePath);
    });
    $view->setEventsManager($event);

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

$di->setShared('jsmin', function()
{
    return new \Lib\Assets\Minify\JS();
});

$di->setShared('device', function()
{
    return new \Lib\Common\MobileDetect();
});

$di->setShared('cssmin', function()
{
    return new \Lib\Assets\Minify\CSS();
});

$di->setShared('assetsManager', function()
{
    return new \Lib\Assets\AssetManager();
});

$di->set('assetsCollection', function()
{
    return new \Lib\Assets\Collection();
});

$di->set('assets', function()
{
    return new \Lib\Assets\Manager();
});

$di->set('db', function ()use ($config) {

    return new \Phalcon\Db\Adapter\Pdo\Mysql([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        "options" => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        )
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