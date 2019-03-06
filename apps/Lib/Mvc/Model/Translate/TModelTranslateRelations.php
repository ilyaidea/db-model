<?php

namespace Lib\Mvc\Model\Translate;


use Lib\Mvc\Model\Language\ModelLanguage;

/**
 * Trait TModelTranslateRelations
 * @package Lib\Mvc\Model\Translate
 * @property ModelLanguage $languageIso
 * @method ModelLanguage getLanguageIso()
 */
trait TModelTranslateRelations
{
    protected function relations()
    {
        $this->belongsTo(
            'language_iso',
            ModelLanguage::class,
            'iso',
            [
                'alias' => 'LanguageIso',
                'foreignKey' => [
                    'message' => 'The language does not exist in Language model'
                ]
            ]
        );

    }

}