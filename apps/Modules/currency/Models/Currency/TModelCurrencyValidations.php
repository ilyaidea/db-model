<?php

namespace Modules\Currency\Models\Currency;


use Modules\Currency\Models\CurrencyCategory\ModelCurrencyCategory;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

/**
 * Trait TModelPagesValidation
 * @package Lib\Mvc\Model\Pages
 * @property \Lib\Validation $validator
 */

trait TModelCurrencyValidations
{

    public function mainValidation()
    {
        $this->validationCategoryId();
        $this->validationTitle();
        $this->validationDescription();
        $this->validationPosition();
        $this->validationCreated();
        $this->validationModified();
    }

    private function validationCategoryId()
    {
        $this->validator->add(
            'category_id',
            new PresenceOf(
                [
                    'message'      => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );


        $this->validator->add(
            'language_iso',
            new InclusionIn(
                [
                    'message'      => 'the :field does not exist in Language model',
                    'domain'       => array_column( ModelCurrencyCategory::find()->toArray(), 'id' ),
                    'cancelOnFail' => true
                ]
            )
        );

    }
    private function validationTitle()
    {
        $this->validator->add(
            'title',
            new PresenceOf(
                [
                    'message'      => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'title',
            new StringLength(
                [
                    'max'            => 100,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                ]
            )
        );
        $this->validator->setFilters( 'title', [ 'trim', 'striptags' ] );


    }
    private function validationDescription()
    {
        $this->validator->add(
            'description',
            new StringLength(
                [
                    'max'            => 250,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

        $this->validator->setFilters( 'description', [ 'trim', 'striptags' ] );

    }
    private function validationPosition()
    {
        $this->validator->add(
            'position',
            new PresenceOf(
                [
                    'message'      => 'The :field is required',
                    'cancelOnFail' => true,
                    'allowEmpty'   => true
                ]
            )
        );
        $this->validator->add(
            'position',
            new Numericality(
                [
                    'message'      => ':field is not numeric',
                    'allowEmpty'   => true,
                    'cancelOnFail' => true,
                ]
            )
        );
        $this->validator->setFilters( 'position', [ 'trim', 'striptags', 'int' ] );

    }
    private function validationCreated()
    {
        $this->validator->add(
            'created',
            new StringLength(
                [
                    'min'           =>10,
                    'max'            => 10,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

    }
    private function validationModified()
    {
        $this->validator->add(
            'modified',
            new StringLength(
                [
                    'min'           =>10,
                    'max'            => 10,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

    }
}