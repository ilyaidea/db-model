<?php

namespace Lib\Mvc\Model\Navbar;

trait TModelNavbarEvents
{

    public function beforeUpdate()
    {
        $this->setModeUpdate(true);
        $this->setModified(date('Y-m-d H:i:s'));
    }

    public function beforeCreate()
    {
        if (!$this->getDisplay())
            $this->setDisplay('full');

        if (!$this->getType())
            $this->setType('click');

        if ($this->getUrl())
            $this->setUrl('#');

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