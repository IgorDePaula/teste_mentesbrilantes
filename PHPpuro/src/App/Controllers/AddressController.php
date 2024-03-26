<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\Core\Controller;
use MentesBrilhantes\Core\Http\Request;

class AddressController extends Controller
{
    public function allAddresses()
    {
        $addressModel = $this->container->get('addressModel');
        $this->json($addressModel->all());
    }

    public function showAddress(Request $request)
    {
        $addressModel = $this->container->get('addressModel');
        $this->json($addressModel->getById($request->address));
    }
}
