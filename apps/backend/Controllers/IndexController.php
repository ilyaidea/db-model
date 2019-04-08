<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 3/14/2019
 * Time: 9:47 AM
 */

namespace Backend\Controllers;


use Lib\Common\Arrays;
use Lib\Mvc\Controller\Controller;
use Lib\Mvc\Model\Navbar\ModelNavbar;

class IndexController extends Controller
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

        $this->view->navbars = $navArray;
    }
    public function testAction()
    {
        $this->view->class = '"bbbb"';
    }


}