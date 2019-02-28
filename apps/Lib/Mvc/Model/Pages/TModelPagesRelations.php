<?php
namespace Lib\Mvc\Model\Pages;

use Lib\Mvc\Model\Language\ModelLanguage;
use Lib\Mvc\Model\PageDesign\ModelPageDesign;
use Lib\Mvc\Model\Widgets\ModelWidgets;

/**
 * Trait TModelPagesRelations
 * @package Lib\Mvc\Model\Pages
 * @property ModelWidgets[] $widgets
 * @method ModelWidgets[] getWidgets()
 * @property ModelPageDesign $pageDesign
 * @method ModelPageDesign getPageDesign()
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

        $this->belongsTo(
            'id',
            ModelPageDesign::class,
            'page_id',
            [
                'alias' => 'PageDesign',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page design value does not exist on the PageDesign model',
                ]
            ]
        );


    }

}