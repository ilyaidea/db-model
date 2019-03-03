<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 3/3/2019
 * Time: 1:10 PM
 */

namespace Backend\Controllers;


use Lib\Mvc\Model\PageCategory\ModelPageCategory;
use Phalcon\Mvc\Controller;

class PageCategoryController extends Controller
{
    public function addAction()
    {
        $category = new ModelPageCategory();

        $category->setLanguageIso('fa');

        $category->setTitle('t');

        $category->setDescription('dec1');

        if (!$category->save())
            die(print_r($category->getMessages()));
        die;
    }

}