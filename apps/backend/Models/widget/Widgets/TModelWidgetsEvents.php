<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/18/2019
 * Time: 9:26 AM
 */

namespace Ad\Backend\Models\Widget\Widgets;



trait TModelWidgetsEvents
{
    public function beforeUpdate()
    {
        $this->setModified(date('Y-m-d H:i:s'));
    }

    public function beforeCreate()
    {
        $this->setCreated(date('Y-m-d H:i:s'));
    }

    public function beforeSave()
    {
        if(!$this->getPosition() || !is_numeric($this->getPosition()))
        {
            $this->setPositionIfEmpty();
        }
    }

}