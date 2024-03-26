<?php

namespace MentesBrilhantes\Core;

class Controller
{
    protected $container = null;

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    protected function json(array $data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
