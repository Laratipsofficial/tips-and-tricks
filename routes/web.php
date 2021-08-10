<?php

use App\Http\Controllers\DashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'users' => User::take(5)->get(),
        'dbConnection' => Cache::get('db-connection', 'mysql'),
    ]);
})->name('welcome');

Route::get('change-db-connection', function () {
    Cache::put('db-connection', request('connection', 'mysql'), now()->addYears(100));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
