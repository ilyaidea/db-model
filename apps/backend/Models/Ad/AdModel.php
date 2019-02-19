<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:56 AM
 */

namespace Ad\Backend\Models\Ad;



use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\ModelUsers;
use Phalcon\Mvc\Model;

class AdModel extends Model
{
    use TAdModelProperties;
    use TAdModelValidation;
    use TAdModelRelations;
    use TAdModelEvents;

    public function initialize()
    {
        $this->setSource('ilya_ad');


    }

}