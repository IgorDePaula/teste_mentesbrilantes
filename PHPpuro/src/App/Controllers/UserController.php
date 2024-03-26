<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\Core\Controller;
use MentesBrilhantes\Core\Http\Request;

class UserController extends Controller
{
    public function allUsers()
    {
        $userModel = $this->container->get('userModel');
        $this->json($userModel->all());
    }

    public function newUser(Request $request)
    {

    }
}
