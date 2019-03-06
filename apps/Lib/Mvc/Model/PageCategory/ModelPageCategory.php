<?php
namespace Lib\Mvc\Model\PageCategory;

use Lib\Mvc\Model\BaseModel;

class ModelPageCategory extends BaseModel
{
    use TModelPageCategoryEvents;
    use TModelPageCategoryRelations;
    use TModelPageCategoryValidations;
    use TModelPageCategoryProperties;

    public function init()
    {
        $this->setSource('ilya_page_category');
    }

}