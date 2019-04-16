<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 4/16/2019
 * Time: 10:18 AM
 */

namespace Modules\Currency\Controllers;


use Lib\Mvc\Controller\Controller;
use Modules\Currency\Models\Currency\ModelCurrency;

class CurrencyController extends Controller
{
    public function indexAction()
    {

    }

    public function showListAction()
    {
        $c = new ModelCurrency();
//        dump($c->convertUnixToTimestamp(1555392979));
//        /** @var ModelCurrency $currencies */
//        $currencies = ModelCurrency::find();
//
//        dump($currencies->toArray());

        /** @var \DateTime $startTime */
        $startTime = $c->convertUnixToTimestamp(1555392979);
        $endTime   = date_sub($startTime,date_interval_create_from_date_string("1 day"));
        dump($endTime);
    }

}