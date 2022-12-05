<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['users'] = User::with(['latestLogin'])->take(5)->get();

        return view('dashboard.index', $data);
    }

    public function profileForm(Request $request)
    {
        return view('dashboard.profile');
    }

    public function profile(Request $request)
    {
        // dump($request->all());
        $data = $request->validate([
            'name' => ['required'],
        ]);
        // dd($data);

        $user = auth()->user();

        User::create(
            $request->all()
        );

        return back()->with('message', 'Profile updated.');
    }
}
