<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/5/2019
 * Time: 12:42 PM
 */

namespace Ad\Backend\Forms\Users ;

use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\Email;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;

class UsersForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $this->addUsername();
        $this->addEmail();
        $this->addMobile();
        $this->addPassword();
        $this->addCsrf();
        $this->addBtn();

    }
    private function addUsername()
    {
        $username = new Text('username',
            [
                'placeholder' => 'insert username'
            ]
        );
        $username->setLabel('username');
        $username->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'the :field is required'
                    ]
                )
            ],
            new Uniqueness(
                [
                    'model' => new UsersModel(),
                    'message' => 'the :field must be unique'
                ]
            )

        );

        $this->add($username);
    }
    private function addEmail()
    {
        $email = new Text('email',
            [
                'placeholder' => 'insert email'

            ]
        );

        $email->setLabel('email');

        $email->addValidators(
            [
                new Email(
                    [
                        "message" => "The e-mail is not valid",
                    ]
                ),
                new Uniqueness(
                    [
                        'model' => new UsersModel(),
                        'message' => 'the :field must be unique',
                    ]
                )
            ]
        );

        $this->add($email);

    }
    private function addMobile()
    {
        $mobile = new Text('mobile',
            [
                'placeholder' => 'insert mobile'

            ]
        );

        $mobile->setLabel('mobile');

        $mobile->addValidators(
            [
                new Uniqueness(
                    [
                        'model' => new UsersModel(),
                        'message' => 'the :field must be unique',
                    ]
                ),
            new StringLength(
                [
                    'min' => 1,
                    'max' => 11,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                ]
            )
        ]
    );

        $this->add($mobile);

    }
    private function addPassword()
    {
        $pass = new Password('password',
            [
                'placeholder' => 'insert pass'
            ]
        );
        $pass->setLabel('password');
        $this->add($pass);

    }
    private function addCsrf()
    {
        $csrf = new Hidden('csrf', [
            'value' => $this->security->getToken()
        ]);

        $this->add($csrf);
    }
    private function addBtn()
    {
        $submit = new Submit('save');

        $this->add($submit);
    }


}