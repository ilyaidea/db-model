<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/6/2019
 * Time: 10:17 AM
 */

namespace Ad\Backend\Controllers;


use Ad\Backend\Forms\Ad\AdForm;
use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Mvc\Controller;

class AdController extends Controller
{
    public function indexAction()
    {
        $form = new AdForm();
        if (!$form->isValid())
        {
            foreach ($form->getMessages() as $message)
            {
                $this->flash->error($message);
            }
        }
        $this->view->form = $form;

    }
    public function addAction()
    {

        $form = new AdForm();
//        $this->tag->setTitle('hi');
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) == false) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }

            }
            else {

                /** @var AdModel $ad */
                $ad = new AdModel();
                   $ad->setUserId($this->request->getPost('user_id'));
                   $ad->setCategoryId($this->request->getPost('category_id')) ;


                if (!$ad->save()) {
                    $this->flash->error($ad->getMessages());
                }
                else
                {
                    $this->flash->success("ad was created successfully");
                }
//                print_r([$_POST]);
            }
        }
        $this->view->form = $form;


    }

}