<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\Pages\ModelPages;
use Phalcon\Mvc\Controller;

class PagesController extends Controller
{
    public function addAction()
    {
        $page = new ModelPages();

        $page->setLanguageIso('fa');
        $page->setTitle('عنوان سایت');
        $page->setTitleMenu('title menu');
        $page->setSlug('s');

        if (!$page->save())
        {
            die(print_r($page->getMessages()));
        }

        die;
    }

}