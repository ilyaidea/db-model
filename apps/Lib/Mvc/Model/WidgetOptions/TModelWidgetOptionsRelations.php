<?php
namespace Lib\Mvc\Model\WidgetOptions;


use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Mvc\Model\Relation;

/**
 * Trait TModelWidgetOptionsRelations
 * @package Lib\Mvc\Model\WidgetOptions
 * @property ModelWidgets[] $widgets
 * @method ModelWidgets[] getWidgets()
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
                'alias' => 'Widgets',
                'foreignKey' => [
                    'message' => 'The widget options cannot be deleted because other tables are using it',
                    'action'  => Relation::ACTION_CASCADE
                ]
            ]
        );
    }
}