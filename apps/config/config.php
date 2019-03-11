<?php

return new \Phalcon\Config(
    [
        'database' => [
            'adapter' => 'Mysql',
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'db-model',
            'charset'  => 'utf8mb4',
            'prefix'   => 'ilya_'
        ],

        'application' => [
            'baseUri'    => '/'.PROJECT_NAME.'/',
            'controllersDir' => APP_PATH . '/controllers/',
            'modelsDir'  => APP_PATH.'/Models/',
            'libraryDir' => APP_PATH.'/Lib/',
            'migrationsDir'  => APP_PATH . '/migrations/',
        ],

    ]
);