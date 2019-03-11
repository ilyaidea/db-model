<?php
namespace Lib\Events;


use Phalcon\Events\EventInterface;
use Phalcon\Mvc\ViewInterface;

class BeforeRenderView
{
    public function __construct(EventInterface $event, ViewInterface $view, $viewEnginePath)
    {
    }
}