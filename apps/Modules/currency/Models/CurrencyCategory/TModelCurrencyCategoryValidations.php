<?php
namespace Modules\Currency\Models\CurrencyCategory;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

/**
 * Trait TModelPagesValidation
 * @package Lib\Mvc\Model\Pages
 * @property \Lib\Validation $validator
 */
trait TModelCurrencyCategoryValidations
{
    public function mainValidation()
    {
        $this->validationParentId();
        $this->validationTitle();
        $this->validationDescription();
        $this->validationPosition();
    }

    private function validationParentId()
    {
        $this->validator->add(
            'parent_id',
            new Numericality(
                [
                    'message'      => 'the :field is not numeric',
                    'allowEmpty'   => true,
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'parent_id',
            new InclusionIn(
                [
                    'message'      => 'the :field does not exist in Language model',
                    'domain'       => array_column( self::find()->toArray(), 'id' ),
                    'cancelOnFail' => true,
                    'allowEmpty'   => true,

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

}