<?php
namespace Modules\Currency\Models\CurrencyPrice;

use Lib\Events\IModelEvents;
use Lib\Mvc\Model\BaseModel;
use Phalcon\Mvc\Model;

class ModelCurrencyPrice extends BaseModel
{
    use TModelCurrencyPriceProperties;
    use TModelCurrencyPriceRelations;
    use TModelCurrencyPriceEvents;
    use TModelCurrencyPriceValidations;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_currency_price');
    }
}