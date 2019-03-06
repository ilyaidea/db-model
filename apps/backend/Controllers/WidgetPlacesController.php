<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\WidgetPlaces\ModelWidgetPlaces;
use Phalcon\Mvc\Controller;

class WidgetPlacesController extends Controller
{
    public function indexAction()
    {

        $widgets = new ModelWidgetPlaces();

//        $widgets->updateValueByName('123','footer');
        $widgets->updateMethod(4,['value' => '','name' =>'123']);

        die;
    }
    public function addAction()
    {
        $widgetplace = new ModelWidgetPlaces();
        $widgetplace->setName('aa');
        $widgetplace->setValue('shafieipiux');
        if (!$widgetplace->save())
        {
            die(print_r($widgetplace->getMessages()));
        }
        else
            echo 'saved';

        die;
    }
    public function updateAction()
    {
        try
        {
            $widgetPlace = new ModelWidgetPlaces();

            $widgetPlace->updateMethod(4,['value' => 'footer','name' =>'foot']);
        }
        catch (\Exception $exception)
        {
            $this->flash->error($exception->getMessage());
        }
        $this->view->disable();
    }

}