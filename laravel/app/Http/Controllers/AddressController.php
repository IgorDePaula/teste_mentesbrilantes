<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return new JsonResponse(Address::all()->load('state', 'city'), JsonResponse::HTTP_OK);
    }

    public function show(Address $address)
    {
        return new JsonResponse($address->load('state', 'city'), JsonResponse::HTTP_OK);
    }
}
