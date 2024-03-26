<?php

namespace MentesBrilhantes\Core\Http;

class Request
{
    private $attrs = [];

    public function __construct(array $attr = [])
    {
        $json = file_get_contents('php://input');
        $this->attrs = $attr;
        $this->normalizeJsonInput(json_decode($json, true));
    }

    public function __get($name)
    {
        return $this->attrs[":{$name}"];
    }

    private function normalizeJsonInput(array $json)
    {
        foreach ($json as $key => $value) {
            $this->attrs[":{$key}"] = $value;
        }
    }

    public function all()
    {
        $array = [];
        foreach ($this->attrs as $key => $value) {
            $array[str_replace(':', '', $key)] = $value;
        }
        return $array;
    }
}
