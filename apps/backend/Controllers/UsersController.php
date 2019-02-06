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
//        /** @var AdListModel $inactive */
//        $inactive = AdListModel::findFirst(2);
//        if ($inactive)
//        {
//            $inactive->setStatus('active');
//           if ( !$inactive->update())
//           {
//               var_dump($inactive->getMessages());
//           }
//
//           else
//           {
//               $inactive->justOneActiveStatus();
//           }
//        }



//        $cat = new CategoryModel();
//        $cat->setTitle('updaterrrrr');
//        $cat->setDescription('delelefffffhfjgjgjg');
//        $cat->setParentId(5);

        ///** @var CategoryModel $update */
//        $update = CategoryModel::findFirst(4);
//            $update->setTitle('aaaaaaaa');
//
//        if ( !$update->update()) {
//            var_dump($update->getMessages());
//        }

//        $adlist = new AdListModel();
//        $adlist->setTitle('dddddd');
//        $adlist->setDescription('ccccccccccccc');
//        $adlist->setAdId(6);
//        $adlist->setStatus('inactive');
        /** @var AdListModel $adlist */
        $adlist = AdListModel::findFirst(127);
        $adlist->setTitle('testi');

        if ($adlist->beforeSave())
        {
            $adlist->update();
            var_dump('success saved');
        }
        else
            var_dump($adlist->getMessages());


    }
    public function limitation($adlist)
    {
//        $time = $adlist->getCreated();
//        $date = strtotime(date_timezone_get());
//        $dateAndTime = date('Y-m-d H',$date);
//        var_dump($dateAndTime);
//        die;
       //$previousPosts = AdListModel::find();
//        (
//            [
//                //'columns' => 'ad_id , created',
//                'conditions' => 'ad_id = ?1 AND created = ?2',
//                'bind' =>
//                    [
//                        1 => $adlist->getAdId(),
//                        2 => $dateAndTime
//                    ]
//            ]
//        );
//        var_dump($previousPosts->toArray());
//        die;
//        if (count($previousPosts->toArray()) >= 2)
//            var_dump('is exist');
//        else
//            var_dump('not exist');
    }

}