<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/17/2019
 * Time: 12:06 PM
 */

namespace Ad\Backend\Models\Users;


use Phalcon\Validation;

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
    }
    private function validationEmail()
    {
    }
    private function validationMobile()
    {
    }
    private function validationPassword()
    {
    }

}