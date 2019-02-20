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
    public function setPositionIfEmpty()
    {
        //create mode
        if (!$this->getId())
        {
            if ( $this->getPosition() == null)
            {
                $widgetDB = ModelWidgets::class;
                /** @var \Phalcon\Mvc\Model\Manager $modelManager */
                $modelManager = $this->getModelsManager();

               $positions = $modelManager->createBuilder()
                   ->columns('MAX(position) AS max')
                   ->from($widgetDB)
                   ->getQuery()
                   ->getSingleResult();
                if($positions->max)
                    $this->setPosition($positions->max +1);


            }

        }

//        //edit mode
//        else
//        {
//
//        }

    }
    public function sortByPosition()
    {
        $widgetDB = ModelWidgets::class;
        /** @var \Phalcon\Mvc\Model\Manager $modelManager */
        $modelManager = $this->getModelsManager();

        $result = $modelManager->createBuilder();
        $result->columns(['id', 'position']);
        $result->from($widgetDB);

        //create mode
        if (!$this->getId())

            $result->orderBy('position ASC,created DESC');

        //edit mode
        else
            $result->orderBy('position ASC,modified DESC');

        $result = $result->getQuery()->execute();

        //iterates the array of positions that is ordered
        $i = 1;
        foreach($result as $res)
        {
            $class = get_class($this);

            $position = $class::findFirst($res->id);

            $position->setPosition($i);

            if(!$position->update())
            {
                foreach($position->getMessages() as $message)
                {
                    die(print_r($message));
                }
            }
            $i++;
        }

//        die(print_r($result->toArray()));
    }


}