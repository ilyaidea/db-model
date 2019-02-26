<?php

namespace Lib\Mvc\Model\Translate;


use Lib\Mvc\Model\Language\ModelLanguage;

trait TModelTranslateRelations
{
    protected function relations()
    {
        $this->belongsTo(
            'language',
            ModelLanguage::class,
            'iso',
            [
                'alias' => 'Language',
                'foreignKey' => [
                    'message' => 'The language does not exist in Language model'
                ]
            ]
        );

    }

}