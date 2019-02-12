<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/10/2019
 * Time: 8:47 AM
 */

namespace Ad\Backend\Controllers;


use Ad\Backend\Forms\Category\CategoryForm;
use Phalcon\Mvc\Controller;

class CategoryController extends Controller
{
    public function indexAction()
    {
//        $this->tag->appendTitle('farzan');
        $form = new CategoryForm();
        $this->view->form = $form;
        $this->view->user = 'userrrrr';
    }

}