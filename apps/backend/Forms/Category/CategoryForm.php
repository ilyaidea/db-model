<?php

namespace Ad\Backend\Forms\Category ;

use Ad\Backend\Models\Category\CategoryModel;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\Email;


class CategoryForm extends Form
{
    public function initialize()
    {
        $this->addParentId();
        $this->addTitle();
        $this->addDescription();
        $this->addPosition();
        $this->addSubmit();
        $this->addCsrf();

    }
    private function addParentId()
    {

    }

    private function addTitle()
    {
        $title = new Text(
            'title',
                [
                    'placeholder' => 'please insert title',
                    'type' => 'text',
                ]
            );

        $title->setLabel('title');

        $title->addValidators(
            [
                new PresenceOf(
                    [
                        'message' =>'the :field is required',
                    ]
                ) ,
                new StringLength(
                    [
                        'min' => 4,
                        'max' => 45,
                        'messageMaximum' => ':field length is too long',
                        'messageMinimum' => ':field length is too short',
                    ]
                ),
                new Uniqueness(
                    [
                        'model' => new CategoryModel(),
                        'message' => ':field must be unique',
                    ]
                ),
                new Email(
                    [
                        "message" => "The e-mail is not valid",
                    ]
                )
            ]
        );
        $title->setFilters(['trim','striptags']);

        $this->add($title);
    }
    private function addDescription()
    {

        $description = new Text(
            'description',
            [
                'placeholder' => 'please insert description',
                'type' => 'text'
            ]
        );

        $description->setLabel('description');

        $description->addValidators(
            [
                new StringLength(
                    [
                        'min' => 12,
                        'max' => 100,
                        'messageMaximum' => ':field length is too long',
                        'messageMinimum' => ':field length is too short',
                    ]
                )
            ]
        );

        $description->setFilters(['trim','striptags']);

        $this->add($description);
    }
    private function addPosition()
    {


    }
    private function addSubmit()
    {
        $submit = new Submit('save');
        $this->add($submit);
    }
    private function addCsrf()
    {
        $csrf = new Hidden('csrf', [
            'value' => $this->security->getToken()
        ]);

        $csrf->clear();
        $this->add($csrf);
    }
}