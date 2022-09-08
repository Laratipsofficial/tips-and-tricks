<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;

class UserController extends Controller
{
    public function type(UserTypeEnum $type)
    {
        dd($type);
    }
}
