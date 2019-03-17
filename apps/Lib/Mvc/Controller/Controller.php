<?php

namespace Lib\Mvc\Controller;
/**
 * Class Controller
 * @property \Lib\Assets\Collection $assetsCollection
 */
class Controller extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->assetsCollection->addJs('assets/jquery/dist/jquery.min.js');

    }

}