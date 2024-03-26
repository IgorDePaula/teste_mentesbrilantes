<?php

namespace MentesBrilhantes\Core\Http\Router;

class ExecutorCompostIterator extends ExecutorIterator
{
    public function add($element, $name = null)
    {
        $this->elements[$name] = $element;
    }
}
