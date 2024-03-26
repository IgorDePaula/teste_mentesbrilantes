<?php

namespace MentesBrilhantes\Core\Concerns;

interface ViewInterface
{
    static public function render($view, array $data = []);
}
