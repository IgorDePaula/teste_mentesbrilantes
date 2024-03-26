<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\Core\Controller;
use MentesBrilhantes\Core\Http\Request;

class CityController extends Controller
{
    public function allCities()
    {
        $cityModel = $this->container->get('cityModel');
        $this->json($cityModel->all());
    }

    public function showCity(Request $request)
    {
        $cityModel = $this->container->get('cityModel');
        $this->json($cityModel->getById($request->city));
    }
}
