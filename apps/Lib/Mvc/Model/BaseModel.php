<?php
namespace Lib\Mvc\Model;

use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    private $modeCreate = false;
    private $modeUpdate = false;


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
}