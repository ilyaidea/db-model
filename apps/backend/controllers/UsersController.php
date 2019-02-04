<?php

namespace Ad\Backend\Controllers;

use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
     $adlist = new AdModel();
    $adlist->setUserId(2);
    $adlist->setCategoryId(1);
    $adlist->setCreated();

     if (!$adlist->save())
         var_dump($adlist->getMessages());




    }

}