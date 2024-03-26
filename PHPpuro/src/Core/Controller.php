<?php

namespace MentesBrilhantes\Core;

use MentesBrilhantes\Core\View\ViewJson;

class Controller
{
    protected $container = null;

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    protected function json(array $data, $status = 200)
    {
        header('Content-Type: application/json', true, $status);
        ViewJson::render(null, $data);
    }
}
