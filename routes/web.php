<?php

use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Fluent;
use Illuminate\Validation\Rule;

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
        'categories' => Category::whereNull('parent_id')->get(),
    ]);
})->name('welcome');

Route::post('submit', function (Request $request) {

    $request->validate([
        'category_id' => ['required'],
        'title' => ['required'],
        'image' => [
            'image',
            Rule::when($request->has_image, ['required'])
        ],
    ]);

    // save the article

    dd($request->all());
})->name('submit');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/category/{category}', function (Category $category) {
    return $category;
})->name('welcome')->withTrashed();

require __DIR__.'/auth.php';
