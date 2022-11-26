<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Mail\SendWelcomeMessageMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SaveUserController extends Controller
{
    public function __invoke(SaveUserRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'normal',
            ]);

            // Mail::to($user)->send(new SendWelcomeMessageMail($user));

            // throw new Exception("something went wrong.");
            $user->roles()->attach($request->role_id);
        });

        return back()->with('success', 'User created successfully.');
    }
}
