<?php
namespace Modules\Currency\Models\CurrencyCategory;


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
                    'allowNulls' => true,
                    'message' => 'The parent_id does not exist'
                ]
            ]
        );

        $this->hasMany(
            'id',
            self::class,
            'parent_id',
            [
                'alias' => 'Childs',
                'foreignKey' => [
                    'message' => 'The Page could not be deleted because other pages are using it'
                ]
            ]
        );
    }
}