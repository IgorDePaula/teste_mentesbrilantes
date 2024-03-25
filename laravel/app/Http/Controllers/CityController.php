<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return new JsonResponse(City::all()->load('state'), JsonResponse::HTTP_OK);
    }

    public function show(City $city)
    {
        return new JsonResponse($city->load('state'), JsonResponse::HTTP_OK);
    }
}
