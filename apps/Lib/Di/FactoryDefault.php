<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2/5/2019
 * Time: 4:56 AM
 */
namespace Lib\Di;


class FactoryDefault extends \Phalcon\Di\FactoryDefault
{
    public function __construct($config)
    {
        parent::__construct();

        $this->setShared('config', $config);
        $this->bindServices();
    }

    private function bindServices()
    {
        $reflection = new \ReflectionObject($this);

        foreach ($reflection->getMethods() as $method)
        {
            $this->condForUseSetOrSetSharedMethod($method);
        }
    }

    protected function condForUseSetOrSetSharedMethod(\ReflectionMethod $method)
    {
        if ($this->isMethodNameStart($method->name, 10, 'initShared'))
        {
            $this->setShared(lcfirst(substr($method->name, 10)), $method->getClosure($this));
        }
        elseif ($this->isMethodNameStart($method->name, 4, 'init'))
        {
            $this->set(lcfirst(substr($method->name, 4)), $method->getClosure($this));
        }
    }

    protected function isMethodNameStart($name, $maxLenght, $needle)
    {
        if ((strlen($name) > $maxLenght) && (strpos($name, $needle) === 0))
        {
            return true;
        }

        return false;
    }

    public function afterInitServices()
    {
        $reflection = new \ReflectionObject($this);

        foreach ($reflection->getMethods() as $method)
        {
            if ($this->isMethodNameStart($method->name, 9, 'afterInit') && $method->name !== 'afterInitServices')
            {
                $methodName = $method->name;
                $this->$methodName();
            }
        }
    }
}