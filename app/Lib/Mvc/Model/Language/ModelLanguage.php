<?php
namespace Lib\Mvc\Model\Language;

use Lib\Mvc\Model\BaseModel;

class ModelLanguage extends BaseModel
{
    use TModelLanguageProperties;
    use TModelLanguageValidations;
    use TModelLanguageEvents;
    use TModelLanguageRelations;

    public function init()
    {
        $this->setSource('ilya_language');
    }

}