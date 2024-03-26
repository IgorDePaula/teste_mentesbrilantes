<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\App\Models\State;
use MentesBrilhantes\Core\Container;
use MentesBrilhantes\Core\Controller;

class StateController extends Controller
{
    public function allStates()
    {
        $stateModel = $this->container->get('stateModel');
        $this->json($stateModel->all());
    }

    

}
