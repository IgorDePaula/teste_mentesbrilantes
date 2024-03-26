<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\Core\Controller;
use MentesBrilhantes\Core\Http\Request;

class AddressController extends Controller
{
    public function allAddresses()
    {
        $cityModel = $this->container->get('addressModel');
        $this->json($cityModel->all());
    }

    public function showAddress(Request $request)
    {
        $cityModel = $this->container->get('addressModel');
        $this->json($cityModel->getById($request->address));
    }
}
