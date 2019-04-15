<?php
namespace Modules\Currency\Models\Currency;

use Lib\Events\IModelEvents;
use Lib\Mvc\Model\BaseModel;
use Phalcon\Mvc\Model;

class ModelCurrency extends BaseModel
{
    use TModelCurrencyProperties;
    use TModelCurrencyRelations;
    use TModelCurrencyEvents;
    use TModelCurrencyValidations;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_currency');
    }
}