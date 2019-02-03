<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace Ad\Backend\Models\Category;


use Ad\Backend\Models\Ad\AdModel;

trait TCategoryModelRelations
{
    public function relations()
    {
        $this->hasMany(
            'id',
            self::class,
            'parent_id',
            [
                'alias' => 'Child',
                'foreignKey' =>
                    [
                        'message' =>'This category cannot be deleted because other categories are using it'
                    ]
            ]
        );
        $this->belongsTo(
            'parent_id',
            self::class,
            'id',
            [
                'alias' => 'Parent',
                'foreignKey' =>
                    [
                        'allowNulls' => true,
                        'message' =>'The parent_id does not exist on the category model'
                    ]
            ]
        );
        $this->hasMany(
            'id',
            AdModel::class,
            'category_id',
            [
                'alias'=> 'AdModel',
                'foreignKey' =>
                    [
                        'allowNulls' => false,
                        'message' =>'This category cannot be deleted because other categories are using it'
                    ]
            ]
        );
    }

}