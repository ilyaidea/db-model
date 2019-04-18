<?php

namespace Modules\Currency\Models\Currency;


use Modules\Currency\Models\CurrencyCategory\ModelCurrencyCategory;
use Modules\Currency\Models\CurrencyPrice\ModelCurrencyPrice;

/**
 * Trait TModelCurrencyRelations
 * @package Modules\Currency\Models\Currency
 * @property ModelCurrencyPrice[] $prices
 * @method ModelCurrencyPrice[] getPrices()
 * @property ModelCurrencyCategory $categories
 * @method ModelCurrencyCategory getCategories()
 */
trait TModelCurrencyRelations
{
    protected function relations()
    {

        $this->hasMany(
            'id',
            ModelCurrencyPrice::class,
            'currency_id',
            [
                'alias' => 'Prices',
                'foreignKey' => [
                    'message' => 'The currency could not be delete because other models are using it'
                ]
            ]
        );

        $this->belongsTo(
            'category_id',
            ModelCurrencyCategory::class,
            'id',
            [
                'alias' => 'Categories',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The category_id does not exist in currency_category model'
                ]
            ]
        );

    }
}