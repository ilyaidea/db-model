<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/23/2019
 * Time: 8:31 AM
 */

namespace Ad\Backend\Controllers;


use Ad\Backend\Models\Widget\WidgetPlaces\ModelWidgetPlaces;
use Ad\Backend\Models\Widget\Widgets\ModelWidgets;
use Phalcon\Mvc\Controller;

class WidgetPlacesController extends Controller
{
    public function indexAction()
    {

        $widgets = new ModelWidgetPlaces();

        $widgets->updateValueByName('123','footer');

        die;
    }
    public function addAction()
    {


    }
    public function updateAction()
    {
        try
        {
            $widgetPlace = new ModelWidgetPlaces();
            $widgetPlace->updateValueById(1,'footer');
        }
        catch (\Exception $exception)
        {
            $this->flash->error($exception->getMessage());
        }
        $this->view->disable();
    }

}