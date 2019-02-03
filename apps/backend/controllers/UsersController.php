<?php

namespace Ad\Backend\Controllers;

use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
       var_dump(array_column(AdModel::find()->toArray(),'id','id'));



    }

}