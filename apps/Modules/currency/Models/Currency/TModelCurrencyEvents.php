<?php
namespace Modules\Currency\Models\Currency;


trait TModelCurrencyEvents
{

    public function beforeCreate()
    {
        $this->setModeCreate(true);
        $this->setCreated(time());
    }

    public function beforeSave()
    {
        if(!$this->getPosition() || !is_numeric($this->getPosition()))
        {
            $this->setPositionIfEmpty();
        }
    }

    public function beforeUpdate()
    {
        $this->setModeUpdate(true);
        $this->setModified(time());
    }

}