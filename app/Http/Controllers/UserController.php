<?php

namespace App\Http\Controllers;

use App\Http\Responses\UserCreateResponse;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::get();
    }

    public function create(Request $request)
    {
        return new UserCreateResponse(new User);
    }

    public function edit(User $user, Request $request)
    {
        return new UserCreateResponse($user);
    }
}
