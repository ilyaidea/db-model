<?php

namespace Lib\Validation\Validator;

use Phalcon\Validation;
use Phalcon\Validation\Validator;

class MyUniquenessValidator extends \Lib\Validation\Validator
{
    /** @var \Phalcon\Mvc\Model $model  */
    private $model;
    private $validation;
    private $fieldValue;
    private $parentCheck;
    private $languageCheck;
    private $cancelOnFail;


    public function __construct(array $options = null)
    {


        parent::__construct($options);

        if ($options != null) {
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
        $this->model = $this->getOption('model');

        $this->validation = $validation;

        $this->fieldValue = $validation->getValue($field);

        $this->parentCheck = $this->getOption('parentCheck');

        $this->languageCheck = $this->getOption('languageCheck');

        $this->cancelOnFail = $this->getOption('cancelOnFail');

        $exclusionDomain = $this->getOption('exclusionDomain');

        if (in_array($this->fieldValue, $exclusionDomain))
            return true;

        $failed = false;

        $valid = new Validation();

        if (method_exists($this->model, 'getParentId') && method_exists($this->model, 'getLanguageIso'))
        {
            $nameNotEqualsParentName = $this->nameNotEqualsParentName($this->fieldValue, $field);

            if (!$nameNotEqualsParentName)
                $failed= true;
        }

        $arrayForUniqueness = $this->queryForFieldUniqueness($field);

        if (empty($arrayForUniqueness))
            return true;

        $valid->add($field,new Validator\ExclusionIn([
            'domain' => $arrayForUniqueness,
            'message' => 'exclusion error',

            ]));

        if (!$this->checkValidate($valid, $this->model))
        {
            foreach ($this->messages as $message)
            {
                $validation->appendMessage($message);

            }
            return false;
        }

        if ($failed === true)
        {
            $label = $this->prepareLabel($validation, $field);
            $message = $this->prepareMessage($validation, $field, "Uniqueness");
            $code = $this->prepareCode($field);
            $replacePairs = [":field" => $label];

            $validation->appendMessage(
                new Validation\Message(
                    strtr($message,$replacePairs),
                    $field,
                    "UniquenessValidator",
                    $code
                )
            );

            return false;
        }

        return true;
    }

    /**
     * return array of titles whose parent and language are equal
     * we use it for title uniqueness validation
     * @example
     *  inputted language : 'fa'
     *  inputted parent_id : 1
     *      array(
     *              [0] => fa_title_1_1
     *              [1] => fa_title_1_2
     *              [2] => fa_title_1_3
     *          )
     * @param string $field
     * @return array
     */
    public function queryForFieldUniqueness($field)
    {
        $parentId = $this->model->getParentId();

        $language = $this->model->getLanguageIso();

        $result = $this->model->getModelsManager()->createBuilder()
            ->from(get_class($this->model));

//اون هایی که پدر یکسان دارند باید یکتا باشند
        if ($this->parentCheck && !$this->languageCheck)
        {
            if (method_exists($this->model,'getParentId'))
            {
                if ($parentId)
                    $result->where(' parent_id = :parentId:', ['parentId' => $parentId]);
                else
                    $result->where(' parent_id IS NULL');
            }
        }
        //اون هایی که زبان یکسان دارند باید یکتا باشند
        elseif (!$this->parentCheck && $this->languageCheck)
        {
            if ($language && method_exists($this->model, 'getLanguageIso'))
                $result->Where('language_iso = :lang:', ['lang' => $language]);

        }
        //هم پدر یکسان و هم زبان یکسان داشته باشند
       elseif($this->parentCheck && $this->languageCheck)
        {
            if ($parentId && method_exists($this->model,'getParentId'))
            {
                if ($parentId !=null)
                    $result->where(' parent_id = :parentId:', ['parentId' => $parentId]);
                else
                    $result->where(' parent_id IS NULL');
            }
            if ($language && method_exists($this->model, 'getLanguageIso'))
                $result->andWhere('language_iso = :lang:', ['lang' => $language]);

        }

         // در کل جدول یکتا بودن را چک کند. میتوان این را در متد vdlidate  نوشت
        // و از uniqueness خود فالکون استفاده کرد
        else
        {
            $valid = new Validation();

            $valid->add($field,new Validator\Uniqueness(
                [
                    'model' => get_class($this->model),
                    'message' => 'model uniqueness',
                    'cancelOnFail' => $this->cancelOnFail
                ]
            ));

            if (!$this->checkValidate($valid, $this->model))
            {
                foreach ($this->messages as $message)
                {
                    $this->validation->appendMessage($message);

                }
            }

        }

        $result = $result->getQuery()->execute();

        return array_column($result->toArray(), $field);

    }

    /**
     * compare value of inputted title with parent's title in the model.with same language
     * return false if they are equal.
     * @param string $value
     * @param string $field
     * @return bool
     */
    public function nameNotEqualsParentName($value, $field)
    {

        $parentId = $this->model->getParentId();

        $language = $this->model->getLanguageIso();

        if (!$language)
            return false;

        if ($parentId && method_exists($this->model, 'getParentId'))
        {
            $parentTitle = $this->model->findFirst(
                [
                    'columns' => $field,
                    'conditions' => 'id = ?1 AND language_iso = ?2',
                    'bind' => [
                        1 => $parentId,
                        2 => $language,
                    ],
                ]
            );

            if ($value == $parentTitle[$field])
            {
                return false;
            }
        }
        return true;
    }
}