<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'roles' => Role::get(['id', 'name']),
        ]);
    }
}
