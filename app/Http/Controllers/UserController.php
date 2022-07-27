<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function type(UserTypeEnum $type)
    {
        dd($type);
    }
}
