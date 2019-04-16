<?php
namespace Modules\Currency\Models\CurrencyPrice;

trait TModelCurrencyPriceEvents
{
    public function beforeCreate()
    {
        $this->setModeCreate(true);
        $this->setCreated(time());
    }

    public function beforeUpdate()
    {
        $this->setModeUpdate(true);
        $this->setModified(time());
    }
}