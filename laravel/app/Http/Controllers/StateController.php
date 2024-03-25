<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    public function index()
    {
        return new JsonResponse(State::all(), JsonResponse::HTTP_OK);
    }

    public function show(State $state)
    {
        return new JsonResponse($state, JsonResponse::HTTP_OK);
    }
}
