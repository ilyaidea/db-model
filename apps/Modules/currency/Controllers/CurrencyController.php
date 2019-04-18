<?php

namespace Modules\Currency\Controllers;


use Lib\Mvc\Controller\Controller;
use Modules\Currency\Models\Currency\ModelCurrency;
use Modules\Currency\Models\CurrencyPrice\ModelCurrencyPrice;

class CurrencyController extends Controller
{
    public function indexAction()
    {
//        /** @var ModelCurrency $curr */
//        $curr = ModelCurrency::findFirst(1);
//
//        $a = $curr->getCategory()->getTitle();
//        dump($a);


////        dump(time());
//        dump( strtotime('today'));
////        dump(date('Y-m-d H:i:s',1555459200));
//
//        $c = new ModelCurrency();
//        dump($c->convertTimestampToUnix('2019-04-17 00:00:01'));



        /** @var ModelCurrency $curr */
        $curr = ModelCurrency::findFirst(1);
//        $b=$curr->convertUnixToTimestampWithHour(1555398725,'15:55:39');
        dump($curr->convertUnixToTimestamp(1555135239));

        $b = $curr->findMinMaxPrice(5,ModelCurrency::TYPE_DAY,ModelCurrency::ACTION_MIN,'10:30:39');

        if (!$b )
            dump('error');
        else
            dump($b);

        $price = new ModelCurrencyPrice();

        $a = $price->calculateUnixTime(0,ModelCurrencyPrice::TYPE_TODAY);

        dump( $a  );
//        dump( strtotime('-1day')  );


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