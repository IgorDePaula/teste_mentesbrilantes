<?php

namespace MentesBrilhantes\App\Controllers;

use MentesBrilhantes\Core\Controller;

class UserController extends Controller
{
    public function allUsers()
    {
        $userModel = $this->container->get('userModel');
        $this->json($userModel->all());
    }
}
