<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 9:49 AM
 */

namespace  Ad\Backend\Models\Ad;


use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\InclusionIn;

trait TAdModelValidation
{
    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

         $this->validationUserId();

        $this->validationCategoryId();

        $this->validationCreated();

        return $this->validate($this->validator);
    }

    private function validationUserId()
    {
        $this->validator->add(
            'user_id',
            new Numericality(
                [
                    'message' => ':field must be numerical',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'user_id',
            new InclusionIn(
                [
                    'domain' => array_column(UsersModel::find()->toArray(),'id','id'),
                    'message' => 'this parent does not exist',
                    'cancelOnFail' => true
                ]
            )
        );

    }
    private function validationCategoryId()
    {
        $this->validator->add(
            'category_id',
            new Numericality(
                [
                    'message' => ':field must be numerical',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'category_id',
            new InclusionIn(
                [
                    'domain' => array_column(CategoryModel::find()->toArray(),'id','id'),
                    'message' => 'this parent does not exist',
                    'cancelOnFail' => true
                ]
            )
        );
    }
    private function validationCreated()
    {
//        $this->validator->add(
//            'created',
//            new PresenceOf(
//                [
//                    'message' => 'the :field is required'
//                ]
//            )
//        );
    }

}
