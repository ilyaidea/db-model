<?php
$router = new Phalcon\Mvc\Router();


          $router->setDefaultModule("backend");

            $router->add('/:controller/:action', [
                'module'     => 'backend',
                'controller' => 1,
                'action'     => 2,
            ])->setName('backend');


            return $router;