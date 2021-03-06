<?php
namespace Lib\Mvc\Model\WidgetOptions;


use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Mvc\Model\Relation;

/**
 * Trait TModelWidgetOptionsRelations
 * @package Lib\Mvc\Model\WidgetOptions
 * @property ModelWidgets $widget
 * @method ModelWidgets getWidget()
 */
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
                    'message' => 'The widget options cannot be deleted because other tables are using it',
                    'action'  => Relation::ACTION_CASCADE
                ]
            ]
        );
    }
}