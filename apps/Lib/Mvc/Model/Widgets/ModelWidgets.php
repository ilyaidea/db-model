<?php

namespace Lib\Mvc\Model\Widgets;

use Lib\Mvc\Model\BaseModel;

class ModelWidgets extends BaseModel
{
    use TModelWidgetsProperties;
    use TModelWidgetsRelations;
    use TModelWidgetsValidations;
    use TModelWidgetsEvents;
    use TModelWidgetsDataStorage;

    public function init()
    {
        $this->setSource('ilya_widgets');

    }

    /**
     * if position field is empty,this method sets position with
     * Maximum position value plus 1
     * @return void
     */
    public function setPositionIfEmpty()
    {
        if (!is_null($this->getPosition()))
            return;

        $queryMaxPosition = $this->getModelsManager()->createBuilder()
            ->columns('MAX(position) AS max')
            ->from(self::class)
            ->getQuery()
            ->getSingleResult();

        $this->setPosition(1);
        if(is_numeric($queryMaxPosition->max))
            $this->setPosition($queryMaxPosition->max +1);

    }

    /**
     * if is create mode: sorts position column ASC and created column DESC
     * if is update mode: sorts position column ASC and modified column DESC
     * @return void
     */
    public function sortByPosition()
    {
        $queryWidgetsForSortPosition = $this->getModelsManager()->createBuilder();
        $queryWidgetsForSortPosition->columns(['id']);
        $queryWidgetsForSortPosition->from(self::class);

        if ($this->isModeCreate())
            $queryWidgetsForSortPosition->orderBy('position ASC,created DESC');

        if($this->isModeUpdate())
            $queryWidgetsForSortPosition->orderBy('position ASC,modified DESC');

        $widgetsForSortPosition = $queryWidgetsForSortPosition->getQuery()->execute();

        $this->iterateAndSaveNewPosition($widgetsForSortPosition);
    }

    /**
     * iterates in sorted array and updates their position with new value from i=1
     * @param array $widgetsForSortPosition
     * @return void
     */
    private function iterateAndSaveNewPosition($widgetsForSortPosition)
    {
        $i = 1;
        foreach($widgetsForSortPosition as $widgetForSortPosition)
        {
            /** @var self $widget */
            $widget = self::findFirst($widgetForSortPosition->id);

            $widget->setPosition($i);

            if(!$widget->update())
            {
                foreach($widget->getMessages() as $message)
                {
                    die(print_r($message->getMessage()));
                }
            }
            $i++;
        }
    }

    /**
     * finds objects in widgets database, whose place that match the specified value
     * @example
     * <code>
     *  $widget = new ModelWidgets();
     *  $widget->findWidgetsByPlace('footer');
     *
 *       [0] => Array
            (
                [id] => 1
                [name] => store
                [place] => footer
                [route_name] => route
                [namespace] => name space
                [position] => 2
                [display] => block
                [width] => 12px
                [created] => 2019-02-20 11:45:31
                [modified] => 2019-02-24 13:21:48
                )

     *
     * </code>
     * @param $value
     * @return array|null
     */
    public function findWidgetsByPlace($value)
    {
        $widgets = self::find(
            [
                'place = :place:',
                'bind' =>
                    [
                        'place' => $value,
                    ]
            ]
        );
        if (!empty($widgets))
            return $widgets->toArray();

        else
            return null;
    }

    /**
     * returns an array of places with their group of widgets
     * @example
     *  Array
            (
                [footer] => Array
                (
                    [0] => widget1
                    [1] => widget2
                    [2] => widget3
                    [3] => widget4
                    [4] => widget5
                )

                [header] => Array
                (
                    [0] => widget6
                    [1] => widget7
                    [2] => widget8
                )
            )
     *
     * @return array|null
     */
    public function getListWidgetsNamePlace()
    {
        $widgets = ModelWidgets::find(
            [
                'columns' => 'name,place'
            ]
        );
        if (!empty($widgets))
        {
            $array =[];

            foreach ($widgets as $widget)
            {
                $array[$widget->place][] = $widget->name;
            }

            return $array;
        }
        return null;

    }

}