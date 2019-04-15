<?php
use Phalcon\Loader;

$loader = new Loader();
$loader->registerNamespaces(
    [
        'App' => APP_PATH,
//        'Modules\Backend\Controllers' => APP_PATH.'/backend/controllers/',
//        'Modules\Backend\Models'      => APP_PATH.'/backend/models/',
//        'Modules\Backend\Plugins'     => APP_PATH.'/backend/plugins/',
//        'Modules\Backend\Forms'     => APP_PATH.'/backend/forms/',
//        'Modules\Backend\Lib'     => APP_PATH.'/backend/lib/',
        'Lib'            => APP_PATH.'/lib/',
    ]
)->registerFiles(
    [
        BASE_PATH. 'vendor/autoload.php'
    ])->register();


