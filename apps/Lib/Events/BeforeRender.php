<?php
namespace Lib\Events;


use Phalcon\Events\EventInterface;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\ViewInterface;

class BeforeRender extends Plugin
{
    public function __construct(EventInterface $event, ViewInterface $view, $viewEnginePath)
    {
        $this->assetsManager->beforeRender($this->getHashKey());
    }

    protected function getHashKey()
    {
        return
            'jkfdfjdk@3#fjfjkdfkd'.
            md5(
                $this->router->getRewriteUri()
            );
    }
}