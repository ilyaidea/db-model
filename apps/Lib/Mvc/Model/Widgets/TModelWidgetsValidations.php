<?php

namespace Lib\Mvc\Model\Widgets;

use Lib\Mvc\Model\WidgetPlaces\ModelWidgetPlaces;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\Callback;


trait TModelWidgetsValidations
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationPageId();

        $this->validationName();

        $this->validationPlace();

        $this->validationNamespace();

        $this->validationPosition();

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
                    'max' => 50,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->setFilters('name',['trim','striptags']);


    }
    private function validationPlace()
    {
        $this->validator->add(
            'place',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        //'place' should select from 'value' column in Widget-Places table
        $this->validator->add(
            'place',
            new InclusionIn(
                [
                    'message' => 'this value is not exist in Widget-Places table',
                    'domain' => array_column(ModelWidgetPlaces::find()->toArray(),'value'),
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'place',
            new StringLength(
                [
                    'max' => 20,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );

    }
    private function validationNamespace()
    {
        $this->validator->add(
            'namespace',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'namespace',
            new StringLength(
                [
                    'max' => 100,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->setFilters('namespace',['trim','striptags']);

    }
    private function validationPosition()
    {
        $this->validator->add(
            'position',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );
        $this->validator->add(
            'position',
            new Numericality(
                [
                    'message' => ':field is not numeric',
                    'allowEmpty' => true,
                    'cancelOnFail' => true,
                ]
            )
        );
        $this->validator->setFilters('position',['trim','striptags','int']);
    }
    private function validationPageId()
    {

    }

}