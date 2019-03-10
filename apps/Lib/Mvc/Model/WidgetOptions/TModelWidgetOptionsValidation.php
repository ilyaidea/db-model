<?php
namespace Lib\Mvc\Model\WidgetOptions;

use Lib\Mvc\Model\Widgets\ModelWidgets;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Callback;

trait TModelWidgetOptionsValidation
{

    /** @var Validation $validator */
    private $validator;

    public function validation()
    {
        $this->validator = new Validation();

        $this->validationWidgetId();

        $this->validationDisplay();

        $this->validationWidth();

        return $this->validate($this->validator);

    }
    private function validationWidgetId()
    {
        $this->validator->add(
            'widget_id',
            new PresenceOf(
                [
                    'message' => 'the :field is required',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'widget_id',
            new Numericality(
                [
                    'message' => 'the :field is not numeric',
                    'cancelOnFail' => true
                ]
            )
        );

        $this->validator->add(
            'widget_id',
            new InclusionIn(
                [
                    'message' => 'the :field does not exist in Widget model',
                    'domain'  => array_column(ModelWidgets::find()->toArray(),'id'),
                    'cancelOnFail' => true
                ]
            )
        );

    }
     private function validationDisplay()
    {
        $this->validator->add(
            'display',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );
        $this->validator->add(
            'display',
            new InclusionIn(
                [
                    'message' => 'the :field is not correct',
                    'domain' => ['block','inline'],
                    'cancelOnFail' => true,
                    'allowEmpty' => true,
                ]
            )
        );

        $this->validator->setFilters('display',['trim','striptags']);

    }
     private function validationWidth()
    {
        $this->validator->add(
            'width',
            new PresenceOf(
                [
                    'message' => 'The :field is required',
                    'allowEmpty' => true,
                    'cancelOnFail' => true

                ]
            )
        );
        $this->validator->add(
            'width',
            new StringLength(
                [
                    'max' => 10,
                    'messageMaximum' => ':field length is too long',
                    'cancelOnFail' => true
                ]
            )
        );
        $this->validator->add(
            'width',
            new Callback(
                [
                    'message' => 'the inputted :field is not in correct format',
                    'callback'=> function($data)
                    {
                        $ext = ['em', 'vh', 'rem', 'px', 'vm', 'fr'];

                        $pattern = "/^(([+-]?)([0-9]*?\.?[0-9]+))(em|px|vh|fr|rem)$/";

                        $array = preg_split($pattern, $data->getWidth(), -1, PREG_SPLIT_DELIM_CAPTURE );
                        if (count($array) < 4 )
                        {
                            return false;

                        }
                        if (!is_numeric($array[3]))
                        {
                            return false;

                        }
                        //the suffix must be in array
                        if (!in_array($array[4], $ext))
                        {
                            return false;
                        }

                        return true;

                    },
                    'cancelOnFail' => true,
                    'allowEmpty' => true
                ]
            )
        );

        $this->validator->setFilters('width',['trim','striptags']);
    }

}