<?php
namespace Lib\Mvc\Model\Widgets;

trait TModelWidgetsEvents
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

}