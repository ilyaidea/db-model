<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\PageCategory\ModelPageCategory;
use Lib\Mvc\Model\Pages\ModelPages;
use Phalcon\Mvc\Controller;

class PagesController extends Controller
{
    public function addAction()
    {
        $page = new ModelPages();

        $page->setLanguageIso('fa');
        $page->setTitle('test1');
        $page->setTitleMenu('title menu');
        $page->setSlug('/jjj');

        if (!$page->save())
        {
            die(print_r($page->getMessages()));
        }

        die;
    }
    public function foreignKeyTestAction()
    {
        /** @var ModelPageCategory $category */
        $category = ModelPageCategory::findFirst(1);

        $page = $category->getPages()->toArray();

        die(print_r($page));

        die;
    }

}