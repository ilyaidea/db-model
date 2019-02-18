<?php

namespace Ad\Backend\Models\Widget\Widgets;

use Ad\Backend\Models\Widget\WidgetPlaces\WidgetPlacesModel;
use Phalcon\Mvc\Model;

/**
 * Class WidgetsModel
 * @package Ad\Backend\Models\Widget\Widgets
 *
 */
class ModelWidgets extends Model
{
    use TModelWidgetsProperties;
    use TModelWidgetsRelations;
    use TModelWidgetsValidations;
    use TModelWidgetsEvents;

    public function initialize()
    {
        $this->setSource('ilya_widgets');

    }

}