<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'roles' => Role::get(['id', 'name']),
        ]);
    }
}
