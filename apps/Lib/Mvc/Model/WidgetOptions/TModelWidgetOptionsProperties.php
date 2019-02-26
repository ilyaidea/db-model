<?php
namespace Lib\Mvc\Model\WidgetOptions;


trait TModelWidgetOptionsProperties
{
    private $id;
    private $widget_id;
    private $display;
    private $width;

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
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param mixed $display
     */
    public function setDisplay( $display )
    {
        $this->display = $display;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth( $width )
    {
        $this->width = $width;
    }
}