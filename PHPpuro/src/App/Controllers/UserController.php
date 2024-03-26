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
        $userModel = $this->container->get('userModel');
        $user = $userModel->create([
            'name' => $request->name,
            'address_id' => $request->address_id,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
        ]);
        if (is_array($user)) {
            $this->json($user, 201);
        } else {
            $this->json([], 500);
        }
    }
}
