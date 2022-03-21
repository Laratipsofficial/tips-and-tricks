<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function () {
    return User::get();
});

Route::get('test', function () {
    // session()->put('test', 'value');
    // session()->put('test2', 'value2');
    return response()->json([
        'name' => 'Laratips',
        'platform' => 'YouTube',
    ]);
});
