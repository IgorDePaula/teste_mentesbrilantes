<?php

namespace MentesBrilhantes\Core\Http\Router;

use MentesBrilhantes\Core\Container;

class Executor
{
    private $rc = null;
    private $container = null;
    private $params = [];

    public function getRc()
    {
        return $this->rc;
    }

    public function setRc(\ReflectionClass $rc)
    {
        $this->rc = $rc;
        return $this;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }

    public function prepareExecution($param, $index, $method)
    {
        $this->fillParameter(
            $this->extractInfoParameters($method, $index), $param
        );
    }

    public function fillParameter($end, $param)
    {
        if ($this->hasType($end)) {
            $this->params[] =
                $this->container->get(reset($end));
        }
        if (!$this->hasType($end)) {
            $this->params[] = $param;
        }
    }

    public function hasType($param)
    {
        return count($param) == 2;
    }

    function extractInfoParameters(\ReflectionMethod $method, $index)
    {
        $refParam = new \ReflectionParameter([$method->class, $method->name], $index);
        return [$refParam->getType()->getName(), $refParam->getName()];
    }

    public function execute($methodName)
    {
        $method = $this->getMethod($methodName);
        $instance = $this->rc->newInstance();
        $params = $this->extractParamsOfMethod($methodName);
        array_walk($params, [$this, 'prepareExecution'], $method);
        $instance->setContainer($this->container);
        return $method->invokeArgs($instance, $this->params);
    }

    function getMethod($name)
    {
        return $this->rc->getMethod($name);
    }

    function extractParamsOfMethod($name)
    {
        return $this->getMethod($name)->getParameters();
    }
}
