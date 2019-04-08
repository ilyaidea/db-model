<?php

namespace Lib\Mvc\Model\Navbar;

use Lib\Mvc\Model\Language\ModelLanguage;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Url;

/**
 * Trait TModelPagesValidation
 * @package Lib\Mvc\Model\Pages
 * @property \Lib\Validation $validator
 */
trait TModelNavbarValidations
{
    public function mainValidation()
    {
        $this->validationParentId();

        $this->validationLanguageIso();

        $this->validationTitle();

        $this->validationDisplay();

        $this->validationIcon();

        $this->validationType();

        $this->validationUrl();

        $this->validationTarget();

        $this->validationPosition();

        $this->validationDescription();

        $this->validationItemClass();

        $this->validationItemId();

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
                    'message'      => 'the :field is not in valid domain',
                    'domain'       => self::findAllParentsByLang( $this->getLanguageIso() ),
                    'cancelOnFail' => true,
                    'allowEmpty'   => true
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
                    'domain'       => array_column( ModelLanguage::find()->toArray(), 'iso' ),
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

    }
     private function validationDisplay()
    {
        $this->validator->add(
            'display',
            new PresenceOf(
                [
                    'message'      => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'display',
            new InclusionIn(
                [
                    "message" => "The display must be 'tree' or 'full' ",
                    "domain"  => ["tree", "full"],
                ]
            )
        );

    }
     private function validationIcon()
    {

    }
     private function validationType()
    {
        $this->validator->add(
            'type',
            new PresenceOf(
                [
                    'message'      => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'type',
            new InclusionIn(
                [
                    "message" => "The type must be 'link' or 'click' or 'hover' ",
                    "domain"  => ["link", "click","hover"],
                ]
            )
        );

    }
     private function validationUrl()
    {
        //اگر فیلد ما از نوع لینکی باشد، باید حتما آدرس آن نوشته شود
        if ($this->getType() && $this->getType() == 'link')
        {
            $this->validator->add(
                'type',
                new PresenceOf(
                    [
                        'message'      => 'the :field is required',
                        'cancelOnFail' => true
                    ]
                )
            );
        }


        $this->validator->add(
            'url',
            new StringLength(
                [
                    'max'            => 255,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

        $this->validator->add(
            'url',
            new Url(
                [
                    "message" => ":field must be a url",
                ]
            )
        );

        $this->validator->setFilters( 'description', [ 'trim', 'striptags' ] );
    }
     private function validationTarget()
    {
        //اگر فیلد ما از نوع لینکی باشد، باید حتما تارگت آن نوشته شود
        if ($this->getType() && $this->getType() == 'link')
        {
            $this->validator->add(
                'target',
                new PresenceOf(
                    [
                        'message'      => 'the :field is required',
                        'cancelOnFail' => true
                    ]
                )
            );
        }

        $this->validator->add(
            'target',
            new InclusionIn(
                [
                    "message" => "The type must be in domain ",
                    "domain"  => ["blank", "top","parent","self"],
                    'allowEmpty'  => true
                ]
            )
        );
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

    }
      private function validationDescription()
    {
        $this->validator->add(
            'description',
            new StringLength(
                [
                    'max'            => 100,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

        $this->validator->setFilters( 'description', [ 'trim', 'striptags' ] );

    }
      private function validationItemClass()
    {
        //باید قوانین مربوط به نام کلاس ها در تگ های اچ تی ام ال رعایت شود


        $this->validator->add(
            'item_class',
            new StringLength(
                [
                    'max'            => 255,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );

    }
      private function validationItemId()
    {
        //باید قوانین مربوط به آیدی در تگ های اچ تی ام ال رعایت شود

        $this->validator->add(
            'item_id',
            new StringLength(
                [
                    'max'            => 255,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail'   => true,
                    'allowEmpty'     => true
                ]
            )
        );
    }

}