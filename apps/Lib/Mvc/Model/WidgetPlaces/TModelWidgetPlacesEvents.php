<?php

namespace Lib\Mvc\Model\WidgetPlaces;


use Lib\Mvc\Model\Widgets\ModelWidgets;

trait TModelWidgetPlacesEvents
{
    public function afterSave()
    {
        $widget = new ModelWidgets();

        if ($this->getTransaction())
            $widget->setTransaction($this->getTransaction());

        if (!$widget->save())
        {
            if ($this->getTransaction())
                $this->getTransaction()->rollBack('rollback: failed');
        }

    }

}