<?php

namespace  Ad\Backend\Models\Ad;


use Ad\Backend\Models\AdList\AdListModel;
use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;

trait TAdModelRelations
{
    public function relations()
    {
        $this->belongsTo(
            'user_id',
            UsersModel::class,
            'id',
            [
                'alias' =>'user',
                'foreignKey' =>
                    [
                        'message' =>'The user does not exist on the User model'
                    ]
            ]
        );

        $this->belongsTo(
            'category_id',
            CategoryModel::class,
            'id',
            [
                'alias' =>'category',
                'foreignKey' =>
                    [
                        'message' =>'The category does not exist on the Category model'
                    ]
            ]
        );

        $this->hasMany(
            'id',
            AdListModel::class,
            'ad_id',
            [
                'alias' =>'adList',
                'foreignKey' =>
                    [
                        'message' =>'The ad cannot be deleted because others are using it'
                    ]
            ]
        );
    }

}