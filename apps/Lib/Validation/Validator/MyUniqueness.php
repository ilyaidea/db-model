<?php

namespace Lib\Validation\Validator;

use Phalcon\Exception;
use Phalcon\Text;
use Phalcon\Validation\Message;
use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Phalcon\ValidationInterface;

class MyUniqueness extends \Lib\Validation\Validator
{
    /** @var \Phalcon\Mvc\Model $model  */
    private $model;
    private $validation;
    private $parentCheck;
    private $languageCheck;
    private $exclusionDomain;
    private $myValidation;
    private $parentField;
    private $languageField;

    public function __construct( array $options = null )
    {
        parent::__construct( $options );

        $this->model = $this->getOption('model');

        $this->parentCheck = $this->getOption('parentCheck', false);

        $this->languageCheck = $this->getOption('languageCheck', false);

        $this->parentField = $this->getOption('parent_field', 'parent_id');

        $this->languageField = $this->getOption('language_field', 'language_iso');

        $this->exclusionDomain = $this->getOption('exclusionDomain', []);

        $this->myValidation = new Validation();

    }

    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param string $field
     * @return bool
     * @throws Exception
     */
    public function validate(Validation $validation, $field)
    {
        $this->validation = $validation;

        if (in_array($validation->getValue($field), $this->exclusionDomain))
            return true;

        if (method_exists($this->model, 'get'.Text::camelize($this->parentField)) && method_exists($this->model, 'get'. Text::camelize($this->languageField)))
        {
            if (!$this->checkNameNotEqualsParentName($validation, $field))
                return false;
        }

        $this->myValidation->add(
            $field,
            new Validator\ExclusionIn([
                'domain' => $this->queryForFieldUniqueness($field),
                'message' => 'exclusion error',
            ]));

        $messages = $this->myValidation->validate(null, $this->model);
        if(is_bool($messages))
            return true;

        foreach ($messages as $message)
            $validation->appendMessage($message);

        return false;
    }

    /**
     * @param ValidationInterface $validation
     * @param $field
     * @param null $message
     */
    protected function setErrorMessage(ValidationInterface $validation, $field, $message = null)
    {
        $label = $this->prepareLabel($validation, $field);

        if(!$message)
            $message = $this->prepareMessage($validation, $field, "MyUniqueness");

        $code = $this->prepareCode($field);
        $replacePairs = [":field" => $label];

        $validation->appendMessage(
            new Message(
                strtr($message,$replacePairs),
                $field,
                "MyUniqueness",
                $code
            )
        );
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
        $result = $this->model->getModelsManager()->createBuilder()
            ->columns([$field])
            ->from(get_class($this->model));

        if ($this->checkParent())
        {
            $parentId = $this->model->{'get'.Text::camelize($this->parentField)}();
            if ($parentId)
                $result->andWhere('parent_id = :parentId:', ['parentId' => $parentId]);
            else
                $result->andWhere('parent_id IS NULL');
        }
        if ($this->languageCheck && method_exists($this->model, 'get'.Text::camelize($this->languageField)))
        {
            $language = $this->model->{'get'.Text::camelize($this->languageField)}();
            $result->andWhere('language_iso = :lang:', ['lang' => $language]);
        }

        return array_column($result->getQuery()->execute()->toArray(), $field);
    }

    /**
     * compare value of inputted title with parent's title in the model.with same language
     * return false if they are equal.
     * @param ValidationInterface $validation
     * @param string $field
     * @return bool
     */
    public function checkNameNotEqualsParentName(ValidationInterface $validation, $field)
    {
        if(!$this->parentCheck)
            return true;

        $parentId = null;
        $language = null;

        if (!$this->checkParent())
        {
            $this->setErrorMessage(
                $validation,
                $field,
                'If parentCheck == true Why Method (get'.Text::camelize($this->parentField). ') does not exist in '. get_class($this->model)
            );
            return false;
        }

        $parentId = $this->model->get{Text::camelize($this->parentField)}();

        if(!$parentId)
            return true;

        if (!$this->checkLanguage())
        {
            $this->setErrorMessage(
                $validation,
                $field,
                'If languageCheck == true Why Method (get'.Text::camelize($this->languageField). ') does not exist in '. get_class($this->model)
            );
            return false;
        }

        $language = $this->model->get{Text::camelize($this->languageField)}();

        if (!$language)
        {
            $this->setErrorMessage(
                $validation,
                $field,
                'If languageCheck == true Why value of language is empty'
            );
            return false;
        }

        $parent = $this->model->findFirst(
            [
                'columns' => $field,
                'conditions' => 'id = ?1 AND language_iso = ?2',
                'bind' => [
                    1 => $parentId,
                    2 => $language,
                ],
            ]
        );

        if ($validation->getValue($field) == $parent->{$field})
        {
            $this->setErrorMessage(
                $validation,
                $field,
                'The value of this :field is the same as the value of his parent\'s :field'
            );
            return false;
        }

        return true;
    }

    protected function checkParent()
    {
        if($this->parentCheck && method_exists($this->model, 'get'.Text::camelize($this->parentField)))
            return true;

        return false;
    }

    protected function checkLanguage()
    {
        if($this->languageCheck && method_exists($this->model, 'get'.Text::camelize($this->languageField)))
            return true;

        return false;
    }
}