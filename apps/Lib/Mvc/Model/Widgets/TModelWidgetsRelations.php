<?php

namespace Lib\Mvc\Model\Widgets;

use Lib\Mvc\Model\Pages\ModelPages;
use Lib\Mvc\Model\WidgetOptions\ModelWidgetOptions;
use Lib\Mvc\Model\WidgetPlaces\ModelWidgetPlaces;

/**
 * Trait TWidgetsModelRelations
 * @package db-model\Backend\Models\Widget\Widgets
 * @property ModelWidgetPlaces $widgetPlace
 * @method ModelWidgetPlaces getWidgetPlace()
 * @property ModelWidgetOptions $widgetOption
 * @method ModelWidgetOptions getWidgetOption()
 * @property ModelPages $page
 * @method ModelPages getPage()
 */
trait TModelWidgetsRelationsR
{
    public function relations()
    {
        $this->belongsTo(
            'place',
            ModelWidgetPlaces::class,
            'value',
            [
                'alias' => 'WidgetPlace',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The place value does not exist on the widget_places model'
                ]
            ]
        );

        $this->belongsTo(
            'id',
            ModelWidgetOptions::class,
            'widget_id',
            [
                'alias' => 'WidgetOption',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The widgetOption value does not exist on the widget_options model'
                ]
            ]
        );

        $this->belongsTo(
            'page_id',
            ModelPages::class,
            'id',
            [
                'alias' => 'Page',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The page_id value does not exist on the Pages model'
                ]
            ]
        );
    }

}