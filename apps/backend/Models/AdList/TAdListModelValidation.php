<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace Ad\Backend\Models\AdList;


use Ad\Backend\Models\Ad\AdModel;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

trait TAdListModelValidation
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationAdId();

        $this->validationTitle();

        $this->validationDescription();

        $this->validationCreated();

        $this->validationStatus();

        return $this->validate($this->validator);
    }
    private function validationAdId()
    {
        $this->validator->add(
            'ad_id',
            new Numericality(
                [
                    'message' => ':field must be numerical',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'ad_id',
            new InclusionIn(
                [
                    'domain' => array_column(AdModel::find()->toArray(),'id','id'),
                    'message' => 'this parent doesn\'n exist ',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'ad_id',
            new PresenceOf(
                [
                    'message' => ' the :field is required',
                    'cancelOnFail' => true

                ]
            )
        );

    }
    private function validationTitle()
    {
        $this->validator->add(
            'title',
            new StringLength(
                [
                    'min' => 3,
                    'max' => 50,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'title',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->setFilters('title','striptags');
    }
    private function validationDescription()
    {
        $this->validator->add(
            'description',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
//        $this->validator->add(
//            'description',
//            new StringLength(
//                [
//                    'min' => 12,
//                    'max' => 800,
//                    'messageMaximum' => ':field length is too long',
//                    'messageMinimum' => ':field length is too short',
//                    'cancelOnFail' => true
//                ]
//            )
//        );
        $this->validator->setFilters('description','striptags');
    }
    private function validationCreated()
    {
        $this->validator->add(
            'created',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
    }
    private function validationStatus()
    {
        $this->validator->add(
            'status',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'status',
            new InclusionIn(
                [
                    'domain'  => [ 'active' , 'inactive'],
                    'message' => 'the :field is not in valid domain',
                    'cancelOnFail' => true
                ]
            )
        );

    }

}
