<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 3/5/2019
 * Time: 9:12 AM
 */

namespace Lib\MyValidators;


use Phalcon\Validation\Validator;

class TitleUniquenessValidator extends Validator
{

    public function __construct(array $options = null)
    {
        parent::__construct($options);

        if ($options != null)
        {
            $this->_options = $options;
        }
    }

    /**
     * Executes the validation
     *
     * @param \Phalcon\Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        // TODO: Implement validate() method.
    }
}