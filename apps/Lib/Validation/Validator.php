<?php

namespace Lib\Validation;

use Phalcon\Mvc\ModelInterface;
use Phalcon\Validation;

class Validator extends Validation\Validator
{
    /** @var \Phalcon\Validation\Message\Group  $messages*/
    protected $messages;

    public function __construct(array $options = null)
    {
        parent::__construct($options);

        $this->messages = new Validation\Message\Group();
    }

    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(Validation $validation, $attribute)
    {

    }

    /**
     * If there is a message(error happened), it returns false otherwise true
     * @param Validation $validation
     * @param \Phalcon\Mvc\ModelInterface $entity
     * @return bool
     */
    public function checkValidate(Validation $validation, ModelInterface $entity)
    {
        $this->messages = $validation->validate(null, $entity);
         if (is_bool($this->messages))
             return true;

        return !count($this->messages);
    }


}