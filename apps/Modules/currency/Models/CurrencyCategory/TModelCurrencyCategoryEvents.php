<?php
namespace Modules\Currency\Models\CurrencyCategory;

trait TModelCurrencyCategoryEvents
{
    public function beforeSave()
    {
        if(!$this->getPosition() || !is_numeric($this->getPosition()))
        {
            $this->setPositionIfEmpty();
        }
    }
}