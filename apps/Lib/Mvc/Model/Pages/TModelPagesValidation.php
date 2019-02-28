<?php
namespace Lib\Mvc\Model\Pages;


use Lib\Mvc\Model\Language\ModelLanguage;
use Phalcon\Validation;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\ExclusionIn;

trait TModelPagesValidation
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationParentId();

        $this->validationLanguageIso();

        $this->validationTitle();

        $this->validationTitleMenu();

        $this->validationSlug();

        $this->validationKeywords();

        $this->validationDescription();

        $this->validationContent();

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

        $this->validator->add(
            'parent_id',
            new InclusionIn(
                [
                    'message' => 'the :field does not exist in Page model',
                    'domain'  => array_column(self::find()->toArray(),'iso'),
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
            new StringLength(
                 [
                     'max' => 10,
                     'messageMaximum' => ':field length is too long',
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
                     'max' => 100,
                     'messageMaximum' => ':field length is too long',
                     'cancelOnFail' => true
                 ]
             )
         );

         $this->validator->add(
             'title',
             new Uniqueness(
                 [
                     'message' => 'the :field is not unique',
                     'model'   => self::class,
                     'cancelOnFail' => true
                 ]
             )
         );

//         $this->validator->add(
//             'title',
//             new Validation\Validator\Alpha(
//                 [
//                     'message' => 'the :field is not Alpha',
//                     'cancelOnFail' => true
//                 ]
//             )
//         );

     }
     private function validationTitleMenu()
    {
        $this->validator->add(
            'title_menu',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'title_menu',
            new StringLength(
                [
                    'max' => 20,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );

    }
     private function validationSlug()
    {

    }
     private function validationKeywords()
    {

    }
     private function validationDescription()
    {

    }
     private function validationContent()
    {

    }
     private function validationPosition()
    {

    }

}