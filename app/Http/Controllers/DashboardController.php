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
}
