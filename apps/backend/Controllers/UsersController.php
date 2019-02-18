<?php

namespace Ad\Backend\Controllers;

use Ad\Backend\Forms\Users\UsersForm;
use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {

        $form = new UsersForm();

        if ($form->isValid($this->request->getPost()) == false)
        {
            foreach ($form->getMessages() as $message)
            {
               $this->flash->error($message);
            }
        }

        $this->view->form = $form;

    }

}