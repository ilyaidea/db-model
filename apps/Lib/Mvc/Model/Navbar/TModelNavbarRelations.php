<?php

namespace Lib\Mvc\Model\Navbar;

use Lib\Mvc\Model\Language\ModelLanguage;

/**
 * Trait TModelNavbarRelations
 * @package Lib\Mvc\Model\Navbar
 * @property ModelNavbar $parent
 * @method  ModelNavbar getParent()
 * @property ModelNavbar[] $child
 * @method  ModelNavbar[] getChild()
 * @property ModelLanguage $lang
 * @method  ModelLanguage getLang()
 */
trait TModelNavbarRelations
{

    protected function relations()
    {
        $this->hasMany(
            'id',
            self::class,
            'parent_id',
            [
                'alias' => 'Child',
                'foreignKey' => [
                    'message' => 'The navbar could not be delete because other navbars are using it'
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
                        'message' => 'The parent_id does not exist in navbar model'
                    ]
            ]
        );

        $this->belongsTo(
            'language_iso',
            ModelLanguage::class,
            'iso',
            [
                'alias' => 'Lang',
                'foreignKey' => [
                    'message' => 'The language does not exist in Language model',
                    'allowNulls' => false,
                ]
            ]
        );
    }
}