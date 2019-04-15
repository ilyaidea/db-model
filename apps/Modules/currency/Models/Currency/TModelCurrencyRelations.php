<?php

namespace Modules\Currency\Models\Currency;


use Modules\Currency\Models\CurrencyCategory\ModelCurrencyCategory;
use Modules\Currency\Models\CurrencyPrice\ModelCurrencyPrice;

/**
 * Trait TModelCurrencyRelations
 * @package Modules\Currency\Models\Currency
 * @property ModelCurrencyPrice[] $price
 * @method ModelCurrencyPrice[] getPrices()
 * @property ModelCurrencyCategory $category
 * @method ModelCurrencyCategory getCategory()
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
                'alias' => 'Price',
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
                'alias' => 'Category',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The category_id does not exist in currency_category model'
                ]
            ]
        );

    }
}