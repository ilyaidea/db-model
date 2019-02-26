<?php
namespace Lib\Mvc\Model\WidgetOptions;


use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Mvc\Model\Relation;

trait TModelWidgetOptionsRelations
{
    protected function relations()
    {
        $this->hasOne(
            'widget_id',
            ModelWidgets::class,
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