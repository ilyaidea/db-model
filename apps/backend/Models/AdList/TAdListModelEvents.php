<?php

namespace Ad\Backend\Models\AdList;


trait TAdListModelEvents
{
    public function beforeSave()
    {
        $oneHourAgo = $this->calculateAnHourAgo();

        $previousPosts = AdListModel::find(
            [
                'conditions' => 'ad_id = ?1 AND created >= ?2',
                'bind' =>
                [
                    1 => $this->getAdId(),
                    2 => $oneHourAgo
                ]
            ]
        );

        if (count($previousPosts->toArray()) >= 10)
        {
            var_dump('You can not edit more than 10 times in an hour');
            return false;
        }

        return true;

    }
    private function calculateAnHourAgo()
    {
        $now = date('Y-m-d H:i:s');
        $reduceOneHour = strtotime ( '-1 hour' ) ;
        $oneHourAgo = date ( 'Y-m-d H:i:s' , $reduceOneHour );
        return $oneHourAgo;
    }

    public function beforeValidation()
    {
        $this->setCreated(date('Y-m-d H:i:s'));

    }
    public function afterValidation()
    {

    }



}