<?php

namespace Ad\Backend\Controllers;

use Ad\Backend\Forms\Users\UsersForm;
use Ad\Backend\Models\Ad\AdModel;
use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\ModelUsers;
use Ad\Backend\Models\Widget\WidgetPlaces\WidgetPlacesModel;
use Ad\Backend\Models\Widget\Widgets\ModelWidgets;
use Phalcon\Filter;
use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        $filter = new Filter();
        die($filter->sanitize('    10   +g   dh  s3   ',['trim','striptags','alphanum']));
//        /** @var WidgetsModel $w */
//        $w = WidgetsModel::findFirst(1);
//        $w->getPlaceWidget()->
//
//        /** @var WidgetPlacesModel $place */
//        $place = WidgetPlacesModel::findFirst(1);
//
//        $this->view->form = $form;

    }

}