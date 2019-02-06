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
//
    }
    public function isUpdateMode()
    {
        if ($this->getId())
            return true ;

        return false;

    }

    public function isCreateMode()
    {
        if (!$this->getId())
            return true ;
        return false;

    }
//    public function setPositionIfEmpty()
//    {
//        /** @var Model\Manager $modelmanager */
//        $modelmanager = $this->getModelsManager();
//        $position = $modelmanager->createBuilder();
//
//        $position->columns('MAX(position) AS max');
//        $position->from($this);
//
//        if(method_exists($this,'getParentId')) {
//            if ($this->getParentId())
//                $position->where('parent_id=:parent:', ['parent' => $this->getParentId()]);
//            else
//                $position->where('parent_id IS NULL');
//
//        }
//
//        if ($this->getId())
//            $position->andWhere('id <> :id:', ['id' => $this->getId()]);
//
//        $position = $position->getQuery()->execute();
//
//        $this->setPosition(1);
//        if($position->max)
//            $this->setPosition($position->max + 1);
//    }

}