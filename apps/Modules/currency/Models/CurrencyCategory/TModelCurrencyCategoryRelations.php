<?php
namespace Modules\Currency\Models\CurrencyCategory;


use Modules\Currency\Models\Currency\ModelCurrency;

/**
 * Trait TModelCurrencyCategoryRelations
 * @package Modules\Currency\Models\CurrencyCategory
 * @property ModelCurrencyCategory $parent
 * @method ModelCurrencyCategory getParent()
 * @property ModelCurrencyCategory[] $child
 * @method ModelCurrencyCategory[] getChild()
 * @property ModelCurrency[] $currency
 * @method ModelCurrency[] getCurrency()
 */
trait TModelCurrencyCategoryRelations
{
    protected function relations()
    {
        $this->belongsTo(
            'parent_id',
            self::class,
            'id',
            [
                'alias' => 'Parent',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The parent id does not exist'
                ]
            ]
        );

        $this->hasMany(
            'id',
            self::class,
            'parent_id',
            [
                'alias' => 'Child',
                'foreignKey' => [
                    'message' => 'The category could not be deleted because other categories are using it'
                ]
            ]
        );

        $this->hasMany(
            'id',
            ModelCurrency::class,
            'category_id',
            [
                'alias' => 'Currency',
                'foreignKey' => [
                    'message' => 'The category could not be deleted because other models are using it'
                ]
            ]
        );
    }
}