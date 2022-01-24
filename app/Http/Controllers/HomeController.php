<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        dump(Cache::getStore());

        if ($request->exists('addToCache')) {
            Cache::put('user', User::first());
        }

        if ($request->exists('removeFromCache')) {
            Cache::forget('user');
        }

        return view('welcome');
    }
}
