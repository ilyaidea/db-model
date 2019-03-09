<?php
namespace Lib\Mvc\Model\PageCategoryMap;

use Lib\Mvc\Model\BaseModel;

class ModelPageCategoryMap extends BaseModel
{
    use TModelPageCategoryMapEvents;
    use TModelPageCategoryMapProperties;
    use TModelPageCategoryMapValidations;
    use TModelPageCategoryMapRelations;

    public function init()
    {
        $this->setSource('ilya_page_category_map');
    }

}