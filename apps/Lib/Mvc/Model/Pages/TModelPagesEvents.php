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