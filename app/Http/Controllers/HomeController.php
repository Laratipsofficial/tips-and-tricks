<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'user' => User::first(),
            'roles' => Role::get(['id', 'name']),
        ]);
    }
}
