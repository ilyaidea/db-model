<?php
namespace Lib\Mvc\Model\Pages;


trait TModelPagesEvents
{
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
//    public function beforeCreate()
//    {
//        $this->create_mode = true;
//        $this->setCreatedAt(date('Y-m-d H:i:s'));
//    }
//
//    public function beforeUpdate()
//    {
//        $this->updat_mode = true;
//        $this->setModifiedIn(date('Y-m-d H:i:s'));
//    }
//
//    public function beforeSave()
//    {
//        if (!$this->getPosition() || !is_numeric($this->getPosition()))
//            $this->setPositionIfEmpty();
//
//        if ($this->getSlug())
//
//            $this->findRoutesBySlug();
//    }

}