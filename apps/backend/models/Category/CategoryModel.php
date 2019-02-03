<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:42 AM
 */

namespace Ad\Backend\Models\Category ;

use Ad\Backend\Models\Ad\AdModel;
use Phalcon\Mvc\Model;

class CategoryModel extends Model
{
    use TCategoryModelProperties ;
    use TCategoryModelEvents ;
    use TCategoryModelRelations ;
    use TCategoryModelValidation ;

    public function initialize()
    {
        $this->setSource('ilya_ad_category');

    }

}