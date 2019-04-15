<?php
$router = new Phalcon\Mvc\Router();

    $router->setDefaultModule('backend');

    $router->add('/:module/:controller/:action/:params', [
        'module' => 1,
        'controller' => 2,
        'action' => 3,
        'params' => 4
    ])->setName('module_controller');


    $router->add('/:module/:controller', [
        'module' => 1,
        'controller' => 2,
        'action' =>'index'

    ])->setName('default_route');

    $router->add('/:module', [
        'module' => 1,
        'controller' =>'index',
        'action' =>'index'

    ])->setName('default_route_index');

        return $router;