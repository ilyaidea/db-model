<?php

namespace Lib\Mvc\Model\PageCategoryMap;


use Lib\Mvc\Model\PageCategory\ModelPageCategory;
use Lib\Mvc\Model\Pages\ModelPages;

/**
 * Trait TModelPageCategoryMapRelations
 * @package Lib\Mvc\Model\PageCategoryMap
 * @property ModelPages $pages
 * @method ModelPages getPages()
 * @property ModelPageCategory $pageCategory
 * @method ModelPageCategory getPageCategory()
 */
trait TModelPageCategoryMapRelations
{
    protected function relations()
    {
        $this->belongsTo(
            'page_id',
            ModelPages::class,
            'id',
            [
                'alias' => 'Pages',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page does not exist in Pages model'
                ]
            ]
        );

        $this->belongsTo(
            'page_category_id',
            ModelPageCategory::class,
            'id',
            [
                'alias' => 'PageCategory',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page category does not exist in Page category model'
                ]
            ]
        );


    }

}