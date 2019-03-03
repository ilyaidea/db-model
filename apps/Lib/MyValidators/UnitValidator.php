<?php

namespace Lib\MyValidators;

use Phalcon\Validation\Validator;
use Phalcon\Validation;

/**
 * Check that a value has valid unit as it's suffix
 * @example  -22px , +0.7rem
 * <code>
 *  $validator = new Validation();
 *
    validator->add(
                'name',
            new UnitValidator
           (
                [
                    'domain' => ['px','rem'],
                    'message' => 'unit validator error',
                    'cancelOnFail' => true,
                    'signed' => true
                ]
            )
        );
 *
 * validator->add(
        [
            'name',
            'value'
        ],
        new UnitValidator(
            [
                'domain' =>
                  [
                        'name' => ['px','rem'],
                        'value' => ['px','rem'],
                   ],
                'message' =>
                 [
                        'name' => 'my name regex error',
                        'value' => 'my value regex error'
                    ],
                "cancelOnFail" => true
            ]
        )
    );
 *
 * @package Lib\MyValidators
 */
class UnitValidator extends Validator\Regex implements Validation\ValidatorInterface
{
    public function __construct($options = null)
    {

        //pass options to original constructor
        parent::__construct($options);

        if ($options != null)
        {
            $this->_options = $options;
        }

    }

    public function validate( Validation $validation, $field)
    {
        $failed = false ;

        $domain = $this->getOption('domain');

        $signed = $this->getOption('signed');

        $value = $validation->getValue($field);

        if ($value == 0)
        {
            $failed = true ;
        }

        if (isset($domain[$field]))
        {
            $fieldDomain = $domain[$field];

            if (is_array($fieldDomain))
                $domain = $fieldDomain;
        }

        if (!is_array($domain))
        {
            die("Option 'domain' must be an array");
        }

        $extension = implode("|",$domain);

        if ($signed)
            $pattern ='/^(([+-]?)([0-9]*?\.?[0-9]+))('.$extension.')$/';
        else
            $pattern ='/^(([0-9]*?\.?[0-9]+))('.$extension.')$/';

        $array = preg_split($pattern, $value, -1, PREG_SPLIT_DELIM_CAPTURE );

        if (count($array) <> 6 )
        {
            $failed = true ;

        }
        elseif(!is_numeric($array[3]))
        {
            $failed = true ;

        }

        if ($failed === true)
        {
            $label = $this->prepareLabel($validation, $field);
				$message = $this->prepareMessage($validation, $field, "UnitValidator");
				$code = $this->prepareCode($field);

			$replacePairs = [":field" => $label];

			$validation->appendMessage(
                new Validation\Message(
                    strtr($message, $replacePairs),
                    $field,
                    "UnitValidator",
                    $code
                )
            );

			return false;
        }
        return true;
    }
}