<?php
namespace Lib\Mvc\Model\PageDesign;


use Lib\Mvc\Model\Pages\ModelPages;
use Phalcon\Mvc\Model\Relation;

/**
 * Trait TModelPageDesignRelations
 * @package Lib\Mvc\Model\PageDesign
 * @property ModelPages $page
 * @method ModelPages getPage()
 */
trait TModelPageDesignRelations
{
    protected function relations()
    {
        $this->hasOne(
            'page_id',
            ModelPages::class,
            'id',
            [
                'alias' => 'Page',
                'foreignKey' => [
                    'message' => 'The page_id does not exist on the pages model',
                    'action'  => Relation::ACTION_CASCADE
                ]
            ]
        );
    }
}