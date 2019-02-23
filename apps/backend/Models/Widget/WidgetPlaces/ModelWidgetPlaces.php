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
use Phalcon\Mvc\Router\Group;
use Phalcon\Validation\Message;

class ModelWidgetPlaces extends Model
{
    use TModelWidgetPlacesProperties;
    use TModelWidgetPlacesRelations;
    use TModelWidgetPlacesValidations;
    use TModelWidgetPlacesEvents;
    use TModelWidgetPlacesUpdate;

    public function initialize()
    {
        $this->setSource('ilya_widget_places');
    }

    /**
     * returns an array of name and value columns
     * @example
     * <code>
     * Array (
     *      [0] => Array (
     *          [name] => foo
     *          [value] => footer
     *      )
     * )
     * </code>
     * @return array
     */
    public function getArrayWidgetPlaces()
    {
            $widgetPlaces = self::find(
                [
                    'columns' => 'id ,name , value',
//                    'order' => 'name ASC'
                ]

            );
            if (!empty($widgetPlaces))
                return $widgetPlaces->toArray();

            return null;

    }

    /**
     * returns an array of [name] => [value]
     * @example
     * <code>
     * if($flip == false)
     * {
     *      [footer] => foo
     *      [header] => head
     *      [sidebar] => side
     * }
     *
     * if($flip == true)
     * {
     *       [foo] => footer
     *       [head] => header
     *       [side] => sidebar
     * }
     * </code>
     * @param bool $flip
     * @return array
     */
    public function getArrayWidgetPlacesNameValue($flip = false)
    {

        $widgetPlaces = self::find(
            [
                'columns' => 'id ,name , value',
            ]

        );
        if (!empty($widgetPlaces))
        {
            if ($flip)
                    return array_column($widgetPlaces->toArray(),'name','value');

            return array_flip(array_column($widgetPlaces->toArray(),'name','value'));

        }
        return null;

//        $std = new \stdClass();
//        if (true)
//        {
//            $std->success = false;
//            $message = new Message('db is empty','name');
//            $std->messages = $message ;
//            return $std;
//        }
    }

    /**
     * updates column value from database, by id and new value
     * @param $id
     * @param $value
     * @example
     * <code>
     * $widgetPlace = new ModelWidgetPlaces();
     * $widgetPlace->updateValueById(1,'footer');
     * </code>
     */
    public static function updateValueById($id,$value)
    {
        /** @var ModelWidgetPlaces $place */
        $place = self::findFirst($id);

        $widgetsArray = ModelWidgets::findWidgetsByPlace($place->getValue());

        $place->setValue($value);

        if(!$place->update())
        {
            foreach($place->getMessages() as $message)
            {
                die(print_r($message->getMessage()));
            }
        }
        else
        {
            /** @var ModelWidgets $widget */
            foreach ($widgetsArray as $widget)
            {
                $widget->setPlace($value);

                if (!$widget->update())
                {
                    die(print_r($widget->getMessages()));
                }
            }

        }

    }


}