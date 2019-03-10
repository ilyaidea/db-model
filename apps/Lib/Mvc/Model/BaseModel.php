<?php
namespace Lib\Mvc\Model;

use Lib\Validation;
use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    use TraitSetPosition;

    private $modeCreate = false;
    private $modeUpdate = false;

    /** @var Validation */
    protected $validator;


    public function initialize()
    {
        if(method_exists($this,'init'))
            $this->init();

        if(method_exists($this,'relations'))
            $this->relations();
    }
    /**
     * @return bool
     */
    public function isModeCreate()
    {
        return $this->modeCreate;
    }

    /**
     * @param bool $modeCreate
     */
    public function setModeCreate( $modeCreate )
    {
        $this->modeCreate = $modeCreate;
    }

    /**
     * @return bool
     */
    public function isModeUpdate()
    {
        return $this->modeUpdate;
    }

    /**
     * @param bool $modeUpdate
     */
    public function setModeUpdate( $modeUpdate )
    {
        $this->modeUpdate = $modeUpdate;
    }

    /**
     * Get transaction
     *
     * @return Model\TransactionInterface
     */
    public function getTransaction()
    {
        return $this->_transaction;
    }

    public function validation()
    {
        $this->validator = new Validation();

        if(method_exists($this, 'customValidators'))
            $this->customValidators();

        if(method_exists($this, 'mainValidation'))
            $this->mainValidation();

        return $this->validate($this->validator);
    }

    public function customValidators()
    {

    }
}