<?php
use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces(
    [
        'Backend\Controllers' => APP_PATH.'/backend/controllers/',
        'Backend\Models'      => APP_PATH.'/backend/models/',
        'Backend\Plugins'     => APP_PATH.'/backend/plugins/',
        'Backend\Forms'     => APP_PATH.'/backend/forms/',
        'Backend\Lib'     => APP_PATH.'/backend/lib/',
        'Lib'            => APP_PATH.'/lib/',
    ]
)->registerFiles(
    [
        BASE_PATH. 'vendor/autoload.php'
    ])->register();


