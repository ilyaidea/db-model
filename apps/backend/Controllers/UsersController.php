<?php

namespace Backend\Controllers;


use Ad\Backend\Models\Users\ModelUsers;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {

    }
    public function addAction()
    {
        $user = new ModelUsers();
        $user->setUsername('fshafiei*323');
        $user->setEmail('ff@gg.com');
        $user->setMobile('09127570655');
        $user->setPassword('1234');

        if (!$user->save())
        {
            foreach ($user->getMessages() as $m)
                die($m);
        }
        echo 'user saved';
        $this->view->disable();
    }

}