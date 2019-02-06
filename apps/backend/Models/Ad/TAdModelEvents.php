<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace  Ad\Backend\Models\Ad;


trait TAdModelEvents
{
    public function beforeValidation()
    {
        $this->setCreated(date('Y-m-d H:i:s'));

    }

}