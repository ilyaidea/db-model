<?php

namespace Ad\Backend\Controllers;

use Ad\Backend\Forms\Users\UsersForm;
use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\ModelUsers;
use Ad\Backend\Models\Widget\WidgetPlaces\WidgetPlacesModel;
use Ad\Backend\Models\Widget\Widgets\ModelWidgets;
use Phalcon\Filter;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {

        //check width validation
        $width = '12-4px';

        $ext = ['em', 'vh', 'rem', 'px', 'vm', 'fr'];

        $pattern = "/^(([+-]?)([0-9]*?\.?[0-9]+))(em|px|vh|fr|rem)$/";

        $array = preg_split($pattern, $width, -1, PREG_SPLIT_DELIM_CAPTURE  );
        print_r($array);

        if (count($array) < 4 )
        {
            die('not ok : count');

        }
        if (!is_numeric($array[3]))
        {
            die('not ok : numeric');

        }
        //the suffix must be in array
        if (!in_array($array[4], $ext))
        {
            die('not ok : in array');
        }

        print_r('ok');


            $this->view->disable();
    }
    public function addAction()
    {
        $w = new ModelWidgets();
        $w->setName('test');
        $w->setPlace('bb');
        $w->setPosition(1);
        $w->setRouteName('route');
        $w->setNamespace('name space');
        $w->setDisplay('block');
        $w->setWidth("33.6px");
        if (!$w->save())
        {
            foreach ($w->getMessages() as $message)
                $this->flash->error($message);
        }
        else
        {
            die(print_r($_POST));
        }


        $this->view->disable();
    }
}