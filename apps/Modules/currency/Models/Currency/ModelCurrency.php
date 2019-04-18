<?php
namespace Modules\Currency\Models\Currency;

use Lib\Events\IModelEvents;
use Lib\Mvc\Model\BaseModel;
use Modules\Currency\Models\CurrencyPrice\ModelCurrencyPrice;
use Phalcon\Mvc\Model;

class ModelCurrency extends BaseModel
{
    const ACTION_MIN = 'min';
    const ACTION_MAX = 'max';
    const TYPE_DAY = 'day';
    const TYPE_MONTH = 'month';
    const TYPE_WEEK = 'week';
    const TYPE_YEAR = 'year';
    const TYPE_TODAY = 'today';


    use TModelCurrencyProperties;
    use TModelCurrencyRelations;
    use TModelCurrencyEvents;
    use TModelCurrencyValidations;
    use TModelCurrencyQueries;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_currency');
    }

    /**
     * gets maximum price in the interval startTime and endTime
     * @param $startTime
     * @param $endTime
     * @return int|false
     */
    public function getMaxPrice($startTime,$endTime)
    {
        $findMax = $this->getPrices([
            'conditions' => 'created BETWEEN :start_time: AND :end_time:',
            'columns' => 'MAX(price) AS max_price',
            'bind' => [
                'start_time' => $startTime,
                'end_time' => $endTime

            ]
        ])->getFirst();

        if (!$findMax)
            return false;

        return $findMax->max_price;
    }

    public function getMinPrice($startTime,$endTime)
    {
        $findMin = $this->getPrices([
            'conditions' => 'created BETWEEN :start_time: AND :end_time:',
            'columns' => 'MIN(price) AS min_price',
            'bind' => [
                'start_time' => $startTime,
                'end_time' => $endTime

            ]
        ])->getFirst();

        if (!$findMin)
            return false;

        return $findMin->min_price;
    }


    /**
     * find maximum|minimum of 'price' according to inputted time.
     * for example: search in records which submitted for a currency in five days ago , from 10:30:39 until 'now'
     * and find max or min.
     * @example
     * <code>
     *   $currency = ModelCurrency::findFirst(2);
     *   $result = $currency->findMinMaxPrice(1 , ModelCurrency::TYPE_WEEK , ModelCurrency::ACTION_MAX,'10:30:39');
     *
     *  if (!$result )
     *    echo('error');
     *   else
     *    echo($result);

     * @param int $param
     * @param string $type
     * @param string $range
     * @return false|int
     */
    public function findMinMaxPrice($param,$type = self::TYPE_DAY,$range = self::ACTION_MAX,$hour)
    {
        if (!is_int($param) || $param < 0)
            return false;

        $currencyPrice = new ModelCurrencyPrice();

        $firstUnixPastTime =$currencyPrice->calculateUnixTime($param,$type);

        $pastTimeWithHour = $this->convertUnixToTimestampWithHour($firstUnixPastTime,$hour);

        $unixPastTimeWithHour = $this->convertTimestampToUnix($pastTimeWithHour);

        if ($range == self::ACTION_MAX)
            return $this->getMaxPrice($unixPastTimeWithHour,time());

        else if ($range == self::ACTION_MIN)
           return $this->getMinPrice($unixPastTimeWithHour,time());

        return false;
    }

}