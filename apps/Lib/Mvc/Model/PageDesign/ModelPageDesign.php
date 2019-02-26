<?php
namespace Lib\Mvc\Model\PageDesign;


use Lib\Mvc\Model\BaseModel;

class ModelPageDesign extends BaseModel
{
    use TModelPageDesignProperties;
    use TModelPageDesignValidation;
    use TModelPageDesignEvents;
    use TModelPageDesignRelations;

    public function init()
    {
        $this->setSource('ilya_page_design');
    }
}