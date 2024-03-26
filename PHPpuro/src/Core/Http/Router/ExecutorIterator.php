<?php

namespace MentesBrilhantes\Core\Http\Router;

class ExecutorIterator implements \Iterator
{
    protected $elements = [];

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }


    public function current()
    {
        return current($this->elements);
    }


    public function next()
    {
        return next($this->elements);
    }


    public function key()
    {
        return key($this->elements);
    }


    public function valid()
    {
        return isset($this->elements[current($this->elements)]);
    }

    public function rewind()
    {
        return reset($this->elements);
    }

    public function count()
    {
        return count($this->elements);
    }

    public function add($element, $name = null)
    {
        $this->elements[] = $element;
    }

    public function remove($element)
    {
        foreach ($this->elements as $index => $e) {
            if ($e == $element) {
                unset($this->elements[$index]);
            }
        }
    }
}
