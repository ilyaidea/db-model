<?php
namespace Lib\Events;


use Phalcon\Events\EventInterface;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\ViewInterface;

class AfterRender extends Plugin
{
    public function __construct(EventInterface $event, ViewInterface $view)
    {
        $this->assetsManager->afterRender($this->getHashKey());
    }

    protected function getHashKey()
    {
        return
            'ajkdwslfejgke'.
            md5(
                $this->router->getRewriteUri()
            );
    }
}