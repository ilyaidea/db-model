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

    public function convertTimestampToUnix($timestamp)
    {
        return strtotime($timestamp);
    }

    public function dateDiff($day)
    {
        $startTime = $this->convertUnixToTimestamp($this->getCreated());
        $endTime   = $startTime->modify('-1 day');

    }
}