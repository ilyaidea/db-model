<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 10:02 AM
 */

namespace Ad\Backend\Models\AdList ;


use Phalcon\Mvc\Model;

class AdListModel extends Model
{
    use TAdListModelProperties;
    use TAdListModelEvents;
    use TAdListModelRelations;
    use TAdListModelValidation;

    public function initialize()
    {
        $this->setSource('ilya_ad_list');

    }

}