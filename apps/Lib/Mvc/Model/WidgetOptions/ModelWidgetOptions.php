<?php
namespace Lib\Mvc\Model\WidgetOptions;


use Lib\Mvc\Model\BaseModel;

class ModelWidgetOptions extends BaseModel
{
    use TModelWidgetOptionsProperties;
    use TModelWidgetOptionsValidation;
    use TModelWidgetOptionsEvents;
    use TModelWidgetOptionsRelations;
    public function init()
    {
        $this->setSource('ilya_widget_options');
    }
}