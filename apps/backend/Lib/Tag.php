<?php
/**
 * Created by PhpStorm.
 * User: User  1
 * Date: 2/12/2019
 * Time: 12:35 PM
 */
namespace Ad\Backend\Lib ;

use Phalcon\Validation\Validator;

class Tag extends \Phalcon\Tag
{
    /**
     * @param \Phalcon\Forms\Element $field
     */
    public function  test($field)
    {
        $row = [];
        /** @var Validator $validator */
        foreach ($field->getValidators() as $validator)
        {
            $validatorName = substr(get_class($validator), strrpos(get_class($validator), '\\') + 1);
            switch ($validatorName)
            {
                case 'PresenceOf':
                    if (isset($row['data-validation']))
                     {
                         $row['data-validation'] .= ',required';
                     }
                    else
                    {
                        $row['data-validation'] = 'required';
                    }
                break;
                case 'StringLength':
                    if (isset($row['data-validation']))
                    {
                        $row['data-validation'] .= ',length';
                        if (!isset($row['data-validation-length']))
                            $row['data-validation-length'] = "{$validator->getOption('min')}-{$validator->getOption('max')}";
                    }
                    else
                    {
                        $row['data-validation'] = 'length';
                        $row['data-validation-length'] = "{$validator->getOption('min')}-{$validator->getOption('max')}";
                    }
                break;
                case 'Email':
                    if (isset($row['data-validation']))
                    {
                        $row['data-validation'] .= ',email';
                    }
                    else
                    {
                        $row['data-validation'] = 'email';
                    }
                    break;
            }


        }

        return $row;
    }

}