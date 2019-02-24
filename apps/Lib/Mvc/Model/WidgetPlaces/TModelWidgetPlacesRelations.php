<?php

namespace Lib\Mvc\Model\WidgetPlaces;

use Lib\Mvc\Model\Widgets\ModelWidgets;

/**
 * Trait TWidgetPlacesModelRelations
 * @package Ad\Backend\Models\Widget\WidgetPlaces
 * @method ModelWidgets[] getWidgets()
 * @property ModelWidgets[] $widgets
 */
trait TModelWidgetPlacesRelations
{
    public function relations()
    {
        $this->hasMany(
            'value',
            ModelWidgets::class,
            'place',
            [
                'alias' => 'Widgets',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The widget place cannot be deleted because other tables are using it',
                ]
            ]
        );
    }

}