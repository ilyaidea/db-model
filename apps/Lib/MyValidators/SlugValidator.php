<?php

namespace Lib\MyValidators;


use Phalcon\Validation;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\ValidatorInterface;

/**
 * check inputted slug
 * @example
 * options:
            'startWithSlash' => true  : /ilyaidea/db-model/tree/master/ER
            'startWithSlash' => false : ilyaidea/db-model/tree/master/ER
 * <code>
 * $validator = new Validation();
 *
       $validator->add(
            'slug',
            new SlugValidator(
            [
                'message' => 'SlugValidator is invalid',
                'startWithSlash' => false,
                'cancelOnFail' => true
            ]
       )
    );
 * </code>
 * @param \Phalcon\Validation $validation
 * @param string $field
 * @return bool
 * @package Lib\MyValidators
 */
class SlugValidator extends Regex
{
    public function __construct(array $options = null)
    {
        parent::__construct($options);

        if ($options != null)
        {
            $this->_options = $options;
        }
        parent::setOption('pattern','/^\/[a-zA-Z0-9]+(?:(-|\/|_)[a-zA-Z0-9]+)*$/');
    }

    public function validate(Validation $validation, $field)
    {
        $failed = false;

        $value = $validation->getValue($field);

        if (!$value)
            $failed = true;

        $startWithSlash = $this->getOption('startWithSlash');

        $checkMaximumLength = strlen($value);

        if ($checkMaximumLength >= 255)
            $failed = true;

        if ($startWithSlash)
            $matched = preg_match($this->getOption('pattern'),$value);
        else
            $matched = preg_match('/^[a-zA-Z0-9]+(?:(-|\/)[a-zA-Z0-9]+)*$/',$value);

        if (!$matched)
            $failed = true;

        if ($failed === true)
        {
            $label = $this->prepareLabel($validation, $field);
            $message = $this->prepareMessage($validation, $field, "SlugValidator");
            $code = $this->prepareCode($field);

            $replacePairs = [":field" => $label];

            $validation->appendMessage(
                new Validation\Message(
                    strtr($message, $replacePairs),
                    $field,
                    "SlugValidator",
                    $code
                )
            );
            return false;
        }
        return true;
    }


}