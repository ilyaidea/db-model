<?php

namespace Ad\Backend\Models\Widget\Widgets;


use Ad\Backend\Models\Widget\BaseModel;

class ModelWidgets extends BaseModel
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
        if (!is_null($this->getPosition()))
            return;

        $queryMaxPosition = $this->getModelsManager()->createBuilder()
            ->columns('MAX(position) AS max')
            ->from(ModelWidgets::class)
            ->getQuery()
            ->getSingleResult();

        $this->setPosition(1);
        if(is_numeric($queryMaxPosition->max))
            $this->setPosition($queryMaxPosition->max +1);

    }

    public function sortByPosition()
    {
        $queryWidgetsForSortPosition = $this->getModelsManager()->createBuilder();
        $queryWidgetsForSortPosition->columns(['id']);
        $queryWidgetsForSortPosition->from(ModelWidgets::class);

        if ($this->isModeCreate())
            $queryWidgetsForSortPosition->orderBy('position ASC,created DESC');

        if($this->isModeUpdate())
            $queryWidgetsForSortPosition->orderBy('position ASC,modified DESC');

        $widgetsForSortPosition = $queryWidgetsForSortPosition->getQuery()->execute();

        $this->iterateAndSaveNewPosition($widgetsForSortPosition);
    }

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

}