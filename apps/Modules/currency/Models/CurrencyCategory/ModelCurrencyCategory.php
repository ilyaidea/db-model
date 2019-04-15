<?php
namespace Modules\Currency\Models\CurrencyCategory;

use Lib\Events\IModelEvents;
use Lib\Mvc\Model\BaseModel;
use Phalcon\Mvc\Model;

class ModelCurrencyCategory extends BaseModel
{
    use TModelCurrencyCategoryProperties;
    use TModelCurrencyCategoryRelations;
    use TModelCurrencyCategoryEvents;
    use TModelCurrencyCategoryValidations;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_currency_category');
    }
}