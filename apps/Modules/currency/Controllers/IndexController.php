<?php
namespace Modules\Currency\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->a = 'ddd';

    }
}