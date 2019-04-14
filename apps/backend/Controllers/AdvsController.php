<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 4/9/2019
 * Time: 10:46 AM
 */

namespace Backend\Controllers;


use Lib\Common\Arrays;
use Lib\Mvc\Controller\Controller;
use Lib\Mvc\Model\Navbar\ModelNavbar;
use Lib\Mvc\View;

class AdvsController extends Controller
{
    public function indexAction()
    {
        /** @var ModelNavbar $navbars */
        $navbars = ModelNavbar::find(
            [
                'conditions'=> 'parent_id IS NULL '
            ]
        );

        $navArray = Arrays::tree($navbars->toArray()) ;

//        $this->view->navbars = $navArray;
        $this->view->setVars(
            [
                'navbars' => $navArray,
//                'posts'    => $posts,
            ]
        );
    }

}