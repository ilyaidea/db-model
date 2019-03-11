<?php
namespace Lib\Mvc;


class View extends \Phalcon\Mvc\View
{
    protected static $id = 1;

    public function partial( $partialPath, $params = null )
    {
        $params['id'] = 'component_'.self::$id;
        parent::partial( $partialPath, $params );
        self::$id++;
    }
}