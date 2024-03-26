<?php

namespace MentesBrilhantes\Core\View;

use MentesBrilhantes\Core\Concerns;

class ViewJson implements Concerns\ViewInterface
{
    static public function render($view, array $data = [])
    {
        echo json_encode($data);
    }
}
