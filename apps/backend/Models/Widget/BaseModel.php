<?php
namespace Ad\Backend\Models\Widget;

use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    private $modeCreate = false;
    private $modeUpdate = false;

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
}