<?php

namespace Backend\Controllers;


use Lib\Common\Arrays;
use Lib\Mvc\Controller\Controller;
use Lib\Mvc\Model\Navbar\ModelNavbar;
use Lib\Mvc\View;

class HomeController extends Controller
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

//        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}