<?php

namespace Lib\Mvc\Model\Language;

use Lib\Mvc\Model\Pages\ModelPages;
use Lib\Mvc\Model\Translate\ModelTranslate;

trait TModelLanguageRelations
{
    protected function relations()
    {
        $this->hasMany(
            'iso',
            ModelTranslate::class,
            'language',
            [
                'alias' => 'Translate',

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
                'alias' => 'page',

                'foreignKey' => [
                    'allowNulls' => false,
                    'message' => 'The language cannot be deleted because other tables are using it',
                ]
            ]
        );


    }

}