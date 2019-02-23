<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/23/2019
 * Time: 12:58 PM
 */

namespace Ad\Backend\Models\Widget\WidgetPlaces;


trait TModelWidgetPlacesUpdate

{
    public function updateValueByName($name,$value)
    {
        /** @var ModelWidgetPlaces $widgetPlace */
        $widgetPlace = self::findFirstByName($name );

        if (!$widgetPlace)
            die('not exist');

        $widgetPlace->setValue($value);

        if (!$widgetPlace->update())
            return false;

        return true;

    }

    public function updateValueByOldValue($oldValue,$value)
    {
        /** @var ModelWidgetPlaces $widgetPlace */
        $widgetPlace = self::findFirstByValue($oldValue);

        if (!$widgetPlace)
            die('not exist');

        $widgetPlace->setValue($value);

        if (!$widgetPlace->update())
            return false;

        return true;

    }
}