<?php

namespace Lib\Mvc\Model\Language;

use Lib\Mvc\Model\Pages\ModelPages;
use Lib\Mvc\Model\Translate\ModelTranslate;

/**
 * Trait TModelLanguageRelations
 * @package Lib\Mvc\Model\Language
 * @property ModelTranslate[] $translates
 * @method ModelTranslate[] getTranslates()
 * @property ModelPages[] $pages
 * @method ModelPages[] getPages()
 */
trait TModelLanguageRelations
{
    protected function relations()
    {
        $this->hasMany(
            'iso',
            ModelTranslate::class,
            'language_iso',
            [
                'alias' => 'Translates',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The language cannot be deleted because other tables are using it',
                ]
            ]
        );
        $this->hasMany(
            'iso',
            ModelPages::class,
            'language_iso',
            [
                'alias' => 'Pages',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The language cannot be deleted because other tables are using it',
                ]
            ]
        );


    }

}