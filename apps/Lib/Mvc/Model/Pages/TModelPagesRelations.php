<?php
namespace Lib\Mvc\Model\Pages;


use Modules\System\Native\Models\Language\ModelLanguage;
use Modules\System\PageManager\Models\Keywords\ModelKeywords;

trait TModelPagesRelations
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
                    'message' => 'The parent_id does not exist in Pages model'
                ]
            ]
        );

        $this->belongsTo(
            'language',
            ModelLanguage::class,
            'iso',
            [
                'alias' => 'Language',
                'foreignKey' => [
                    'message' => 'The language does not exist in Language model'
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
                    'message' => 'The Page could not be delete because other Pages are using it'
                ]
            ]
        );
    }

}