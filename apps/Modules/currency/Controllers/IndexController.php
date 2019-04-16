<?php
namespace Modules\Currency\Controllers;

use Modules\Currency\Models\Currency\ModelCurrency;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
//        gmdate('Y-m-d H:i:s',1555392979)

        $cur = new ModelCurrency();

        $cur->setTitle('ین چین');
        $cur->setCategoryId(6);
        if (!$cur->save())
            dump($cur->getMessages());
        else
            dump('saved');

    }
}