<?php

namespace Lib\Mvc\Model\Language;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;

trait TModelLanguageValidations
{
    public function validation()
    {
        $validator = new Validation();

        /*
         * ISO
         */
        if($this->getId())
        {
            /** @var ModelLanguage $language */
            $language = ModelLanguage::findFirst($this->getId());
            if($this->getIso() !== $language->getIso())
            {
                $validator->add( 'iso', new Uniqueness( [
                    'model'   => new ModelLanguage(),
                    'message' => 'The inputted ISO language is existing'
                ] ) );
            }
            if($this->getTitle() !== $language->getTitle())
            {
                $validator->add('title', new Uniqueness([
                    'model' => new ModelLanguage(),
                    "message" => "The inputted title is existing"
                ]));
            }
        }
        else
        {
            $validator->add( 'iso', new Uniqueness( [
                'model'   => new ModelLanguage(),
                'message' => 'The inputted ISO language is existing'
            ] ) );
            $validator->add('title', new Uniqueness([
                'model' => new ModelLanguage(),
                "message" => "The inputted title is existing"
            ]));
        }

        $validator->add( 'iso', new PresenceOf( [
            'model'   => new ModelLanguage(),
            'message' => 'ISO is required'
        ] ) );

        /*
         * Name
         */
        $validator->add('title', new PresenceOf([
            'model' => new ModelLanguage(),
            'message' => 'Name is required'
        ]));

        return $this->validate($validator);
    }

}