<?php

namespace App\Http\Controllers;

use App\Http\Apis\FakeStoreApi;
use App\Http\Apis\LaratipsApi;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return (new LaratipsApi)->get('users');
        return (new FakeStoreApi)->get('products', [
            'limit' => 2
        ]);

        $data['users'] = User::with(['latestLogin'])->take(5)->get();

        return view('dashboard', $data);
    }
}
