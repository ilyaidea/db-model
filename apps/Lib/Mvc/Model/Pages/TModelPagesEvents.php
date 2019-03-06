<?php
namespace Lib\Mvc\Model\Pages;


trait TModelPagesEvents
{
    public function beforeUpdate()
    {
        $this->setModeUpdate(true);
        $this->setModified(date('Y-m-d H:i:s'));
    }

    public function beforeCreate()
    {
        $this->setModeCreate(true);
        $this->setCreated(date('Y-m-d H:i:s'));
    }

    public function beforeValidation()
    {
        $parentId = $this->getParentId();

        $language = $this->getLanguageIso();

        if ($parentId)
        {
            //بررسی اینکه عنوان پدرش با عنوان خودش برابر نباشد
            $parentTitle = self::findFirst(
                [
                    'columns' => 'title',
                    'conditions' =>'id = ?1 AND language_iso = ?2',
                    'bind' => [
                        1 => $parentId,
                        2 => $language,
                    ],
                ]
            );
            if ($this->getTitle() == $parentTitle['title'])
            {
                die('this is parent\'s title ! ' );
            }
        }
    }
    public function beforeSave()
    {
        if(!$this->getPosition() || !is_numeric($this->getPosition()))
        {
            $this->setPositionIfEmpty();
        }
    }
    public function afterSave()
    {
        //$this->sortByPosition();
    }
//    public function beforeValidation()
//    {
//        if($this->getLanguage() == null)
//        {
//            $this->setLanguage($this->getDI()->getShared('helper')->locale()->getLanguage());
//        }
//
//        if(!$this->getSlug() && $this->getTitle())
//        {
//            $this->setSlug(str_replace(' ', '-', $this->getTitle()));
//        }
//
//    }
//

}