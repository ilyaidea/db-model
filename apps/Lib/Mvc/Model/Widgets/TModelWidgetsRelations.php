<?php

namespace Lib\Mvc\Model\Widgets;

use Lib\Mvc\Model\WidgetPlaces\ModelWidgetPlaces;

/**
 * Trait TWidgetsModelRelations
 * @package Ad\Backend\Models\Widget\Widgets
 * @property ModelWidgetPlaces $placeWidget
 * @method ModelWidgetPlaces getPlaceWidget()
 */
trait TModelWidgetsRelations
{
    public function relations()
    {
        $this->belongsTo(
            'place',
            ModelWidgetPlaces::class,
            'value',
            [
                'alias' => 'PlaceWidget',
                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The place value does not exist on the widget_places model'
                ]
            ]
        );
    }

}