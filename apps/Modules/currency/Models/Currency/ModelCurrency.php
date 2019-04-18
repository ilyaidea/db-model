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
     * @param string $maxOrMin
     * @return false|int
     */
    public function findMinMaxPrice($param,$type = self::TYPE_DAY,$maxOrMin = self::ACTION_MAX,$hour)
    {
        if (!is_int($param) || $param < 0)
            return false;

        $currencyPrice = new ModelCurrencyPrice();

        // محاسبه یونیکس 5 روز پیش از ساعت کنونی تا الان
        $firstUnixPastTime =$currencyPrice->calculateUnixTime($param,$type);

        //در تاریخ 5 روز پیش، از ساعتی که بهش داده شده تا الان رو محاسبه میکنه
        $unixPastTimeWithHour = $this->calculateUnixWithHour($firstUnixPastTime,$hour);

        if ($maxOrMin == self::ACTION_MAX)
            return $this->getMaxPrice($unixPastTimeWithHour,time());

        else if ($maxOrMin == self::ACTION_MIN)
           return $this->getMinPrice($unixPastTimeWithHour,time());

        return false;
    }

    /**
     * @example
     * <code>
     *  $this->findMaxMinWithHour(10,11)
     * </code>
     * @param string $startHour
     * @param string $endHour
     * @param string $date
     */
    public function findMaxPriceOneDayWithHour($startHour,$endHour,$date)
    {

        $unixStartTimeWithHour = $this->convertTimestampToUnix($date.$startHour);

        $unixEndTimeWithHour = $this->convertTimestampToUnix($date.$endHour);

        //برای هر روز بین ساعت 10 تا 11 بیشترین مقدار قیمت را میدهد
        $find = $this->getPrices([
            'conditions' => 'created BETWEEN :start_time: AND :end_time:',
            'columns' => 'MAX(price) AS max_price',
            'bind' => [
                'start_time' => $unixStartTimeWithHour,
                'end_time' => $unixEndTimeWithHour

            ]
        ])->toArray();
dump($find);
    }

    //findMinMaxPrice(5, self::TYPE_DAY,MAX,'10:00','11:00')
    //محاسبه ی کمترین بیشترین قیمت در 5 روز پیش در ساعات 10 تا 11
    public function findMinMaxPriceWithHour($param,$type = self::TYPE_DAY,$startTime,$endTime)
    {
        /** @var ModelCurrencyPrice $currencyPrice */
        $currencyPrices = ModelCurrencyPrice::find()->toArray();

//        dump($currencyPrice);
        // محاسبه یونیکس 5 روز پیش از ساعت کنونی تا الان
//        $firstUnixPastTime =$currencyPrice->calculateUnixTime($param,$type);

        //در تاریخ 5 روز پیش، از ساعتی که بهش داده شده تا الان رو محاسبه میکنه
//        $unixPastTimeWithHour = $this->calculateUnixWithHour($firstUnixPastTime,$startTime);

        $arrayCreated = [];
        foreach ($currencyPrices as $currencyPrice)
        {
            $arrayCreated = $this->convertUnixToTimestamp($currencyPrice['created']);
//          $this->findMaxPriceOneDayWithHour($startTime,$endTime);

        }

        dump($arrayCreated);
    }

}