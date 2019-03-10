<?php

namespace Lib\Mvc\Model\PageCategory;


use Lib\Mvc\Model\Language\ModelLanguage;
use Lib\Mvc\Model\PageCategoryMap\ModelPageCategoryMap;
use Lib\Mvc\Model\Pages\ModelPages;

/**
 * Trait TModelPageCategoryRelations
 * @package Lib\Mvc\Model\PageCategory
 * @property ModelPageCategory $parent
 * @method  ModelPageCategory getParent()
 * @property ModelPageCategory[] $child
 * @method  ModelPageCategory[] getChild()
 * @property ModelLanguage $lang
 * @method  ModelLanguage getLang()
 * @property ModelPageCategoryMap[] $pageCategoriesMap
 * @method  ModelPageCategoryMap[] getPageCategoriesMap()
 * @property ModelPages[] $pages
 * @method ModelPages[] getPages()
 */
trait TModelPageCategoryRelations
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
                    'message' => 'The parent_id does not exist in Page category model'
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
                    'message' => 'The Page category could not be delete because other Page categories are using it'
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
            ModelPageCategoryMap::class,
            'page_category_id',
            [
                'alias' => 'PageCategoriesMap',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page category cannot be deleted because other tables are using it',
                ]
            ]
        );

        $this->hasManyToMany(
            'id',
            ModelPageCategoryMap::class,
            'page_category_id','page_id',
            ModelPages::class,
            'id',
            [
                'alias' => 'Pages',

            ]
        );

    }
}