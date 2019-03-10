<?php

namespace Lib\Mvc\Model\PageCategory;

use Lib\Mvc\Model\Language\ModelLanguage;
use Lib\MyValidators\TextValidator;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\StringLength;

trait TModelPageCategoryValidations
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();


        $this->validationParentId();

        $this->validationLanguageIso();

        $this->validationTitle();

        $this->validationDescription();

        $this->validationPosition();


        return $this->validate($this->validator);

    }

    private function validationParentId()
    {
        $this->validator->add(
            'parent_id',
            new Numericality(
                [
                    'message' => 'the :field is not numeric',
                    'allowEmpty' => true,
                    'cancelOnFail' => true
                ]
            )
        );

        //حتما باید زبان پدرش رو بررسی کنه
        $this->validator->add(
            'parent_id',
            new InclusionIn(
                [
                    'message' => 'the :field does not exist in Page category model',
                    'domain'  => array_column(self::find()->toArray(),'id'),
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );

    }
     private function validationLanguageIso()
    {

        $this->validator->add(
            'language_iso',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'language_iso',
            new InclusionIn(
                [
                    'message' => 'the :field does not exist in Language model',
                    'domain'  => array_column(ModelLanguage::find()->toArray(),'iso'),
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
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'title',
            new StringLength(
                [
                    'max' => 40,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
//هر عنوانی در سطح خودش باید یکتا باشد یعنی تمام فرزندان یک پدر باید یکتا باشند
//        $this->validator->add(
//            'title',
//            new Uniqueness(
//                [
//                    'message' => 'the :field is not unique',
//                    'model'   => self::class,
//                    'cancelOnFail' => true
//                ]
//            )
//        );
//باید فارسی را هم قبول کند و البته دو کلمه ای ها هم قبول کند
//         $this->validator->add(
//             'title',
//             new Validation\Validator\Alpha(
//                 [
//                     'message' => 'the :field is not Alpha',
//                     'cancelOnFail' => true
//                 ]
//             )
//         );

         $this->validator->setFilters('title',['trim','striptags']);
    }
     private function validationDescription()
    {
        $this->validator->add(
            'description',
            new StringLength(
                [
                    'min' => 12,
                    'max' => 200,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );

        $this->validator->setFilters('description',['trim','striptags']);

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


}