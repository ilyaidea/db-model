<?php
namespace Lib\Assets;


class Collection extends \Phalcon\Assets\Collection
{
    /**
     * @return null
     */
    public function __toString()
    {
        return '';
    }
}