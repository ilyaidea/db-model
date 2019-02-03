<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace Ad\Backend\Models\AdList;


use Ad\Backend\Models\Ad\AdModel;

trait TAdListModelRelations
{
    public function relations()
    {
        $this->belongsTo(
            'ad_id',
            AdModel::class,
            'id',
            [
                'alias' =>'AdModel',
                'foreinKey' =>
                    [
                        'message' =>'The ad_id does not exist on the Ad model'
                    ]
            ]
        );

    }

}