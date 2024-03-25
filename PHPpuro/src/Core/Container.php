<?php

namespace MentesBrilhantes\Core;

class Container
{
    private $store = [];

    public function getStore()
    {
        return $this->store;
    }

    public function add($name, $value)
    {
        $this->store[$name] = $value;
    }

    public function has($name)
    {
        return isset($this->store[$name]);
    }

    public function get($name)
    {
        return $this->store[$name];
    }
}
