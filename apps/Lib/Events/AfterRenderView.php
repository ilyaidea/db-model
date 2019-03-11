<?php
namespace Lib\Events;


use Phalcon\Events\EventInterface;
use Phalcon\Mvc\ViewInterface;

class AfterRenderView
{
    public function __construct(EventInterface $event, ViewInterface $view)
    {
    }
}