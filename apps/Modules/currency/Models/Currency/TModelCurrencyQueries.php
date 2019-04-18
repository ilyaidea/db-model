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
    public function calculateUnixWithHour($unix,$hour)
    {
        $date = date("Y-m-d ".$hour, $unix);

        return $this->convertTimestampToUnix($date);
    }

    public function convertTimestampToUnix($timestamp)
    {
        return strtotime($timestamp);
    }

}