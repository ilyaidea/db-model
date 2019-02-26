<?php
namespace Lib\Mvc\Model\PageDesign;


use Lib\Mvc\Model\Pages\ModelPages;
use Phalcon\Mvc\Model\Relation;

trait TModelPageDesignRelations
{
    protected function relations()
    {
        $this->hasOne(
            'page_id',
            ModelPages::class,
            'id',
            [
                'alias' => 'Widget',
                'foreignKey' => [
                    'message' => 'The widget_id does not exist on the Widget model',
                    'action'  => Relation::ACTION_CASCADE
                ]
            ]
        );
    }
}