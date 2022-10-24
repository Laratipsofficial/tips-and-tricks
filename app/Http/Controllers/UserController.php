<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users');
    }

    public function type(UserTypeEnum $type)
    {
        dd($type);
    }
}
