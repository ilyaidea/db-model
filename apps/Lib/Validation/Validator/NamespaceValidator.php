<?php

namespace Lib\Validation\Validator;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Regex;

class NamespaceValidator extends Regex
{
    public function validate(Validation $validation, $field)
    {
        $this->setOption('pattern','/^([A-Z][a-z0-9\_]*\\?)*\;$/');

        return parent::validate($validation, $field);
    }

}