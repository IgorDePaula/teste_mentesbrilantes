<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::all()->load('state');
    }

    public function show(City $city)
    {
        return $city->load('state');
    }
}
