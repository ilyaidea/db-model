<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/18/2019
 * Time: 8:50 AM
 */

namespace Ad\Backend\Models\Widget\WidgetPlaces;


use Ad\Backend\Models\Widget\Widgets\ModelWidgets;
use Phalcon\Mvc\Model;

class ModelWidgetPlaces extends Model
{
    use TModelWidgetPlacesProperties;
    use TModelWidgetPlacesRelations;
    use TModelWidgetPlacesValidations;
    use TModelWidgetPlacesEvents;

    public function initialize()
    {
        $this->setSource('ilya_widget_places');
    }

}