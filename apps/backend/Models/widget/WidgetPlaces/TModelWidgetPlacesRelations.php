<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/18/2019
 * Time: 9:46 AM
 */

namespace Ad\Backend\Models\Widget\WidgetPlaces;


use Ad\Backend\Models\Widget\Widgets\ModelWidgets;

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
                    'message' => 'The part cannot be deleted because other tables are using it',
                ]
            ]
        );
    }

}