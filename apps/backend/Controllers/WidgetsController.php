<?php

namespace Ad\Backend\Controllers;

use Lib\Mvc\Model\Pages\ModelPages;
use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Transaction;

class WidgetsController extends Controller
{

    public function widthValidationAction()
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
        $manager = new Transaction\Manager();

        $transaction = $manager->get();

        $w = new ModelWidgets();
        $w->setName('posssss');
        $w->setPlace('bb');
        $w->setPosition(3);
        $w->setNamespace('name space');

        $w->setTransaction($transaction);

        if (!$w->save())
        {
            foreach ($w->getMessages() as $message)
                $this->flash->error($message);

            $transaction->rollback('rollback: can not save');
        }
        else
        {
            $transaction->commit();

            $w->sortByPosition();
            echo 'saved';
        }


        $this->view->disable();
    }
    public function updateAction()
    {
        $widgetmodel = new ModelWidgets();
//        $a = $widgetmodel->getListWidgetsNamePlace();
        $w = $widgetmodel->findWidgetsByPlace('footer');

        die(print_r($w));

        $this->view->disable();

    }
    public function storeDataAction()
    {
        $widget = new ModelWidgets();
        $widget->storeData(null,['name'=>'123','route_name'=>'routename','namespace'=>'spaces']);
        die;
    }
}