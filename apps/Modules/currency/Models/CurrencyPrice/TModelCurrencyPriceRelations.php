<?php
namespace Modules\Currency\Models\CurrencyPrice;

use Modules\Currency\Models\Currency\ModelCurrency;

/**
 * Trait TraitRelationsCurrencyPriceModel
 * @package Modules\Currency\Models\CurrencyPrice
 * @property ModelCurrency $currency
 * @method ModelCurrency $getCurrency
 */
trait TModelCurrencyPriceRelations
{
    protected function relations()
    {
        $this->belongsTo(
            'currency_id',
            ModelCurrency::class,
            'id',
            [
                'alias' => 'Currency',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The currency_id does not exist in currency model'
                ]
            ]
        );
    }
}