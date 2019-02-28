<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\WidgetPlaces\ModelWidgetPlaces;
use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Transaction\Manager;

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

        $manager = new Manager();

        $transaction = $manager->get();

        $widgetplace->setTransaction($transaction);

        $widgetplace->setName('left sidebar');
        $widgetplace->setValue('left sidebar');

        if (!$widgetplace->save())
        {
            $transaction->rollback('rollback: can not save');

            var_dump($widgetplace->getMessages());
        }




        $transaction->commit();


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