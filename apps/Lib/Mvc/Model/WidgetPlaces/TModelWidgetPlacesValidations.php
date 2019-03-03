<?php

namespace Lib\Mvc\Model\WidgetPlaces;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;

trait TModelWidgetPlacesValidations
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationName();

        $this->validationValue();

        return $this->validate($this->validator);

    }
    private function validationName()
    {
        $this->validator->add(
            'name',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'name',
            new StringLength(
                [
                    'min'=>2,
                    'max' => 45,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->setFilters('name',['trim','striptags']);
    }
    private function validationValue()
    {
        $this->validator->add(
            'value',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'value',
            new StringLength(
                [
                    'max' => 20,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'value',
            new Uniqueness(
                [
                    'message' =>'the :field is not unique',
                    'domain' => self::class,
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->setFilters('value',['trim','striptags','alphanum']);
    }

}