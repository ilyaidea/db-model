<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\Language\ModelLanguage;
use Phalcon\Mvc\Controller;

class LanguageController extends Controller
{

    public function indexAction()
    {
        /** @var ModelLanguage $lang */
        $lang = ModelLanguage::findFirst(2);
        $a = $lang->getPages()->toArray();
        die(print_r($a));
    }
}