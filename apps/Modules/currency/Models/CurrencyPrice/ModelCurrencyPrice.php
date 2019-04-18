<?php
namespace Modules\Currency\Models\CurrencyPrice;

use Lib\Mvc\Model\BaseModel;

class ModelCurrencyPrice extends BaseModel
{
    const ACTION_PAST = '-';
    const ACTION_NEXT = '+';
    const TYPE_DAY = 'day';
    const TYPE_MONTH = 'month';
    const TYPE_WEEK = 'week';
    const TYPE_YEAR = 'year';
    const TYPE_TODAY = 'today';

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

    /**
     * @example
     *  <code>
     *       calculateUnixTime(1,ModelCurrencyPrice::TYPE_DAY)
     *  </code>
     *
     * @param $param int
     * @param $type string
     * @param $action string
     * @return bool|int
     */
    public function calculateUnixTime($param = 0, $type = self::TYPE_DAY, $action = self::ACTION_PAST)
    {
        if (!is_int($param) || $param < 0)
            return false;

       switch ($type)
       {
           case self::TYPE_DAY :
               return strtotime($action.$param.' '.self::TYPE_DAY);
           case self::TYPE_WEEK :
               return strtotime($action.$param.' '.self::TYPE_WEEK);
           case self::TYPE_MONTH :
               return strtotime($action.$param.' '.self::TYPE_MONTH);
           case self::TYPE_YEAR :
               return strtotime($action.$param.' '.self::TYPE_YEAR);
           case self::TYPE_TODAY :
               return strtotime(self::TYPE_TODAY);
           default:
               return false;
       }
    }


}