<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all()->load('address', 'city', 'state');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user->load('address', 'city', 'state');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        return $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }
}
