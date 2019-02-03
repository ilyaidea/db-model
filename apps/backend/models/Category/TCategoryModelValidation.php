<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace Ad\Backend\Models\Category;


use Phalcon\Validation;
use Phalcon\Validation\Validator\Numericality ;
use Phalcon\Validation\Validator\InclusionIn ;
use Phalcon\Validation\Validator\PresenceOf ;
use Phalcon\Validation\Validator\Uniqueness ;
use Phalcon\Validation\Validator\StringLength ;

trait TCategoryModelValidation
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationParentId();

        $this->validationTitle();

        $this->validationDescription();

        return $this->validate($this->validator);

    }
    private function validationParentId()
    {
        $this->validator->add(
            'parent_id',
            new Numericality(
                [
                    'message' => ':field must be numerical',
                    'allowEmpty' => true,
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'parent_id',
            new InclusionIn(
                [
                    'domain' => array_column(CategoryModel::find()->toArray(),'id','id'),
                    'message' => 'this parent doesn\'n exist ',
                    'allowEmpty' => true,
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
                    'message' => ':field is required',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'title',
            new Uniqueness(
                [
                    'model' => self::class,
                    'message' => ':field must be unique',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'title',
            new StringLength(
                [
                    'min' => 4,
                    'max' => 45,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
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
            new StringLength(
                [
                    'min' => 12,
                    'max' => 100,
                    'messageMaximum' => ':field length is too long',
                    'messageMinimum' => ':field length is too short',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->setFilters('description','striptags');
    }

}
