<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 4/11/2019
 * Time: 9:28 AM
 */

namespace Backend\Controllers;


use Lib\Mvc\Controller\Controller;
use Lib\Mvc\View;

class SliderController extends Controller
{
    public function indexAction()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);

    }

}