<?php
namespace Lib\Mvc\Model\Pages;

use Lib\Mvc\Model\Language\ModelLanguage;
use Lib\Mvc\Model\PageCategory\ModelPageCategory;
use Lib\Mvc\Model\PageCategoryMap\ModelPageCategoryMap;
use Lib\Mvc\Model\Widgets\ModelWidgets;

/**
 * Trait TModelPagesRelations
 * @package Lib\Mvc\Model\Pages
 * @property ModelWidgets[] $widgets
 * @method ModelWidgets[] getWidgets()
 * @property ModelLanguage $lang
 * @method ModelLanguage getLang()
 * @property ModelPages $parent
 * @method ModelPages getParent()
 * @property ModelPages[] $child
 * @method ModelPages[] getChild()
 * @property ModelPageCategoryMap[] $pageCategoriesMap
 * @method ModelPageCategoryMap[] getPageCategoriesMap()
 * @property ModelPageCategory[] $categories
 * @method  ModelPageCategory[] getCategories()
 *
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

        $this->hasMany(
            'id',
            self::class,
            'parent_id',
            [
                'alias' => 'Child',
                'foreignKey' => [
                    'message' => 'The Page could not be delete because other children are using it'
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

        $this->hasMany(
            'id',
            ModelPageCategoryMap::class,
            'page_id',
            [
                'alias' => 'PageCategoriesMap',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page cannot be deleted because other tables are using it',
                ]
            ]
        );

        $this->hasManyToMany(
            'id',
            ModelPageCategoryMap::class,
            'page_id','page_category_id',
            ModelPageCategory::class,
            'id',
            [
                'alias' => 'Categories',

            ]
        );


    }

}