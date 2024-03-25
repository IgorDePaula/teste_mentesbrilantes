<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all()->load('state','city');
    }

    public function show(Address $address)
    {
        return $address->load('state','city');
    }
}
