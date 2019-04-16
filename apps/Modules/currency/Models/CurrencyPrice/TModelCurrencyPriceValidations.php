<?php
namespace Modules\Currency\Models\CurrencyPrice;
use Modules\Currency\Models\Currency\ModelCurrency;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

/**
 * Trait TModelPagesValidation
 * @package Lib\Mvc\Model\Pages
 * @property \Lib\Validation $validator
 */
trait TModelCurrencyPriceValidations
{
    public function mainValidation()
    {
        $this->validationCurrencyId();
        $this->validationPrice();
        $this->validationCreated();
        $this->validationModified();
    }
    private function validationCurrencyId()
    {
        $this->validator->add(
            'currency_id',
            new PresenceOf(
                [
                    'message'      => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );


        $this->validator->add(
            'currency_id',
            new InclusionIn(
                [
                    'message'      => 'the :field does not exist in Language model',
                    'domain'       => array_column( ModelCurrency ::find()->toArray(), 'id' ),
                    'cancelOnFail' => true
                ]
            )
        );

    }
    private function validationPrice()
    {
        $this->validator->add(
            'price',
            new Numericality(
                [
                    'message'      => ':field is not numeric',
                    'allowEmpty'   => true,
                    'cancelOnFail' => true,
                ]
            )
        );

        $this->validator->setFilters( 'title', [ 'trim', 'striptags','int' ] );

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