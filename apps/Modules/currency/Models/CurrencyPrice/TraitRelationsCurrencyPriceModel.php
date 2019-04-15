<?php
namespace Modules\Currency\Models\CurrencyPrice;

use Modules\Currency\Models\Currency\ModelCurrency;

trait TraitRelationsCurrencyPriceModel
{
    protected function relations()
    {
        $this->belongsTo(
            'currency_id',
            ModelCurrency::class,
            'id'
        );
    }
}