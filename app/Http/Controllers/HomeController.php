<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidUserException;
use App\Http\Requests\SaveUserRequest;
use App\Mail\TestingMail;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::select(['id', 'name'])
            ->with(['roles'])
            ->first();

        // throw new InvalidUserException($user);
        // Mail::to('wow@test.test')->send(new TestingMail($user));

        $users = User::query()
            ->when(
                $request->name,
                fn ($q, $name) => $q->where('name', 'like', "%{$name}%")
            )
            ->paginate(10);

        return view('welcome', [
            'user' => $user,
            'users' => $users,
            'roles' => Role::get(['id', 'name']),
            // ...$data,
        ]);
    }
}
