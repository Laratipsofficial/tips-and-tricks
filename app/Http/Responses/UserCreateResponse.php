<?php

namespace App\Http\Responses;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;

class UserCreateResponse implements Responsable
{
    public function toResponse($request)
    {
        $roles = Role::select(['id', 'name'])->get();

        return view('admin.users.create', [
            'roles' => $roles,
            'user' => $this->user,
        ]);
    }

    public function __construct(private User $user)
    {
    }
}
