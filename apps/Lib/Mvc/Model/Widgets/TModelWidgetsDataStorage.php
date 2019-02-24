<?php

namespace Lib\Mvc\Model\Widgets;


trait TModelWidgetsDataStorage
{
    /**
     * @param null/int $id
     * @param array $data
     */
    public function storeData($id = null , $data)
    {
        if (isset($id))
        {
            /** @var ModelWidgets $widget */
            $widget  = self::findFirst($id);
            if (!$widget)
                return;
        }
        else
            $widget = new ModelWidgets();

        foreach ($data as $key => $value)
        {
            $ucfirstKey = ucfirst($key);

            if (method_exists($widget,'set'.$ucfirstKey))
            {
                $methodName = 'set'.$ucfirstKey;

                $widget->$methodName($value);
            }
        }

        if (!$widget->save())
            var_dump($widget->getMessages());
        else
            var_dump('updated');

    }

}