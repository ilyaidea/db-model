<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:56 AM
 */

namespace Ad\Backend\Models\Ad;


use Phalcon\Mvc\Model;

class AdModel extends Model
{
    public function initialize()
    {
        $this->setSource('ilya_ad');
    }

}