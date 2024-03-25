<?php

namespace MentesBrilhantes\Core\Http;

class Request
{
    private $attrs = [];

    public function __construct(array $attr = [])
    {
        $this->attrs = $attr;
    }

    public function __get($name)
    {
        return $this->attrs[":{$name}"];
    }

}
