<?php

namespace Backend\Controllers;


use Lib\Mvc\Model\PageCategory\ModelPageCategory;
use Lib\Mvc\Model\Pages\ModelPages;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;

class PagesController extends Controller
{
    public function addAction()
    {

        $page = new ModelPages();

        $page->setLanguageIso('fa');
        $page->setTitle('fa_title_1_1');
        $page->setTitleMenu('title menu');
        $page->setParentId(1);
        $page->setSlug('/jjj');

        if (!$page->save())
        {
            die(print_r($page->getMessages()));
        }
        else
            die('saved');

    }
    public function updateAction()
    {
        /** @var ModelPages $page */
        $page = ModelPages::findFirst(33);

//        $page->setTitle('en_title_1_1');

//        $page->setLanguageIso('en');

        $page->setSlug('/test');

//        $page->setParentId(null);

        if (!$page->update())
            die(print_r($page->getMessages()));
        else
            die('updated');

    }
    public function foreignKeyTestAction()
    {
        /** @var ModelPageCategory $category */
        $category = ModelPageCategory::findFirst(1);

        $page = $category->getPages()->toArray();

        die(print_r($page));

        die;
    }
    public function queryAction()
    {
        $parentId = $this->getParentId();

        $language = $this->getLanguageIso();

        $parentTitle = self::find(
            [
                'columns' => 'title',
                'id = ?1 AND language_iso = ?2',
                'bind' => [
                    1 => $parentId,
                    2 => $language,
                ],
            ]
        );

        $result = $this->getModelsManager()->createBuilder()
            ->from(self::class)

            ->where(' parent_id = :parentId:',
                ['parentId'=>$parentId])

            ->andWhere('language_iso = :lang:',[ 'lang'=> $language ])

            ->andWhere('title = :title:',[ 'title' => $parentTitle->title ])

            ->getQuery()

            ->execute();

        return array_column($result->toArray(),'title');
    }

}