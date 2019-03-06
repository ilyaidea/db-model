<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 3/5/2019
 * Time: 9:12 AM
 */

namespace Lib\MyValidators;


use Phalcon\Validation;
use Phalcon\Validation\Validator;

class MyUniquenessValidator extends Validator
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
     * @param string $field
     * @return bool
     */
    public function validate(Validation $validation, $field)
    {
        $failed = false;

        $value = $validation->getValue($field);


//        /** @var \Phalcon\Mvc\Model $model */
        $model  = $this->getOption('model');
//        $message = $this->getOption('message');

        $arrayWithSameParentLang = $model->queryForTitleUniqueness($field);

        if (in_array($value,$arrayWithSameParentLang))
        {
            $failed = true;
        }

            if ($failed === true)
            {
                $label = $this->prepareLabel($validation, $field);
                $message = $this->prepareMessage($validation, $field, "ExclusionIn");
                $code = $this->prepareCode($field);
                $replacePairs = [":field"=> $label, ":domain"=>  join(", ", $arrayWithSameParentLang)];

                $validation->appendMessage(
                    new Validation\Message(
                        strtr($message, $replacePairs),
                        $field,
                        "TitleUniquenessValidator",
                        $code
                    )
                );

			return false;
        }

        return true;
    }
}