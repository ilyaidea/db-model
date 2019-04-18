<?php

namespace Modules\Currency\Models\Currency;


trait TModelCurrencyQueries
{

    /**
     * @param $unix
     * @return \DateTime
     */
    public function convertUnixToTimestamp($unix)
    {
        return date("Y-m-d H:i:s", $unix);
    }
    public function convertUnixToTimestampWithHour($unix,$hour)
    {
        return date("Y-m-d ".$hour, $unix);
    }

    public function convertTimestampToUnix($timestamp)
    {
        return strtotime($timestamp);
    }

}