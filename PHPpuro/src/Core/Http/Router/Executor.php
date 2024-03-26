<?php

namespace MentesBrilhantes\Core\Http\Router;

use MentesBrilhantes\Core\Container;

class Executor
{
    private $rc = null;
    private $container = null;
    private $params = [];
    private $mparams = [];

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

    public function setDi(Container $container)
    {
        $this->container = $container;
        return $this;
    }

    function extractParamsOfMethods()
    {
        $methods = $this->getMethods();
        $params = new ExecutorCompostIterator();
        foreach ($methods as $method) {
            $params->add($method->name, $method->getParameters());
        }
        return $params;
    }

    function getMethods()
    {
        return $this->rc->getMethods(\ReflectionMethod::IS_PUBLIC);
    }

    function notEmpty($item)
    {
        return !empty($item);
    }

    public function prepareExecution($param, $index, $method)
    {
        $this->fillParameter(
            $this->extractInfoParameters($method, $index), $this->mparams
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
        return [$refParam->getType(), $refParam->getName()];
    }

    public function execute($methodName, $parameter = null)
    {
        $this->mparams = $parameter;
        $method = $this->getMethod($methodName);
        $instance = $this->rc->newInstance();
        $params = $this->extractParamsOfMethod($methodName);
        array_walk($params, [$this, 'prepareExecution'], $method);
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
