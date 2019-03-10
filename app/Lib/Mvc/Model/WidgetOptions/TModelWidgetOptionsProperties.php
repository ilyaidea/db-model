<?php
namespace Lib\Mvc\Model\WidgetOptions;


trait TModelWidgetOptionsProperties
{
    private $id;
    private $widget_id;
    private $col_start;
    private $col_end;
    private $row_start;
    private $row_end;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getWidgetId()
    {
        return $this->widget_id;
    }

    /**
     * @param mixed $widget_id
     */
    public function setWidgetId( $widget_id )
    {
        $this->widget_id = $widget_id;
    }

    /**
     * @return mixed
     */
    public function getColStart()
    {
        return $this->col_start;
    }

    /**
     * @param mixed $col_start
     */
    public function setColStart($col_start)
    {
        $this->col_start = $col_start;
    }

    /**
     * @return mixed
     */
    public function getColEnd()
    {
        return $this->col_end;
    }

    /**
     * @param mixed $col_end
     */
    public function setColEnd($col_end)
    {
        $this->col_end = $col_end;
    }

    /**
     * @return mixed
     */
    public function getRowStart()
    {
        return $this->row_start;
    }

    /**
     * @param mixed $row_start
     */
    public function setRowStart($row_start)
    {
        $this->row_start = $row_start;
    }

    /**
     * @return mixed
     */
    public function getRowEnd()
    {
        return $this->row_end;
    }

    /**
     * @param mixed $row_end
     */
    public function setRowEnd($row_end)
    {
        $this->row_end = $row_end;
    }


}