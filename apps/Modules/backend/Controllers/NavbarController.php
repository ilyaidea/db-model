<?php

namespace Modules\Backend\Controllers;


use Lib\Common\Arrays;
use Lib\Mvc\Controller\Controller;
use Lib\Mvc\Model\Navbar\ModelNavbar;

class NavbarController extends Controller
{
    public function indexAction()
    {
        /** @var ModelNavbar $a */
        $navbars = ModelNavbar::find();
       dump(Arrays::tree($navbars->toArray())) ;
    }

//    public function testAction()
//    {
//        /** @var ModelNavbar $a */
//        $a = ModelNavbar::find()->toArray();
//        $file = 'file.txt';
//        file_put_contents($file,$a);
//        die($file);
//
//    }

}