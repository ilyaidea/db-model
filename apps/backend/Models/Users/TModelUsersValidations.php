<?php

namespace Ad\Backend\Models\Users;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;

trait TModelUsersValidations
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationUserName();

        $this->validationEmail();

        $this->validationMobile();

        $this->validationPassword();

        return $this->validate($this->validator);

    }
    private function validationUserName()
    {
        $this->validator->add(
            'username',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'username',
            new StringLength(
                [
                    'min' => 5,
                    'max' => 20,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'username',
            new Uniqueness(
                [
                    'message' => 'The :field must be unique',
                    'model'   => self::class,
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'username',
            new Regex(
                [
                    'message'=>'the inputted :field is not valid',
                    'pattern' => '/^[a-z0-9\-\_]{5,}$/',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->setFilters('username',['trim']);

    }
    private function validationEmail()
    {
        $this->validator->add(
            'email',
            new StringLength(
                [
                    'min' => 3,
                    'max' => 80,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );

        $this->validator->add(
            'email',
            new Uniqueness(
                [
                    'message' => 'The :field must be unique',
                    'model'   => self::class,
                    'cancelOnFail' => true,
                    'allowEmpty' => true,
                ]
            )
        );

        $this->validator->add(
            'email',
            new Email(
                [
                    'message' => 'The :field is not valid'
                ]
            )
        );

        $this->validator->setFilters('email',['email','trim','striptags']);

    }
    private function validationMobile()
    {
        $this->validator->add(
            'mobile',
            new StringLength(
                [
                    'max' => 15,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );

        $this->validator->add(
            'mobile',
            new Uniqueness(
                [
                    'message' => 'The :field must be unique',
                    'model'   => self::class,
                    'cancelOnFail' => true,
                    'allowEmpty' => true,
                ]
            )
        );

        $this->validator->add(
            'mobile',
            new Regex(
                [
                    'message' => 'the :field is not valid',
                    'pattern' => '/^(\+?\d{1,3}[- ]?)?\d{10}$/',
                    'cancelOnFail' => true,
                    'allowEmpty' => true,
                ]
            )
        );

        $this->validator->setFilters('mobile','trim');
    }
    private function validationPassword()
    {
        $this->validator->add(
            'password',
            new StringLength(
                [
                    'max' => 255,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );
        $this->validator->setFilters('password',['trim','striptags']);
    }

}