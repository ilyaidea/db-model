<?php
namespace Lib\Mvc\Model\Pages;

use Lib\Mvc\Model\Language\ModelLanguage;
use Lib\Mvc\Model\Widgets\ModelWidgets;

/**
 * Trait TModelPagesRelations
 * @package Lib\Mvc\Model\Pages
 * @property ModelWidgets[] $widgets
 * @method ModelWidgets[] getWidgets()
 * @property ModelLanguage $lang
 * @method ModelLanguage getLang()
 */
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
            'language_iso',
            ModelLanguage::class,
            'iso',
            [
                'alias' => 'Lang',
                'foreignKey' => [
                    'message' => 'The language does not exist in Language model',
                    'allowNulls' => false,
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

        $this->hasMany(
            'id',
            ModelWidgets::class,
            'page_id',
            [
                'alias' => 'Widgets',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page cannot be deleted because other tables are using it',
                ]
            ]
        );

    }

}