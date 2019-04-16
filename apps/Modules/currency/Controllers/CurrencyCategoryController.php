<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 4/16/2019
 * Time: 10:30 AM
 */

namespace Modules\Currency\Controllers;


use Lib\Mvc\Controller\Controller;
use Modules\Currency\Models\CurrencyCategory\ModelCurrencyCategory;

class CurrencyCategoryController extends Controller
{
    public function indexAction()
    {
        dump(array_column( ModelCurrencyCategory::find()->toArray(), 'id' ));

    }

}