<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SaveUserController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::prefix('invoice')
    ->controller(InvoiceController::class)
    ->group(function () {
        Route::get('generate', 'generate');
        Route::get('download', 'download');
        Route::get('send', 'send');
    });

Route::get('/', HomeController::class)->name('home');
Route::post('save-user', SaveUserController::class)->name('save-user');

Route::get('tree', function () {
    return Category::tree();
});

Route::post('submit', function (Request $request) {
    $request->validate([
        'category_id' => ['required'],
        'title' => ['required'],
        'image' => [
            'image',
            Rule::when($request->has_image, ['required']),
        ],
    ]);

    // save the article

    dd($request->all());
})->name('submit');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/category/{category}', function (Category $category) {
    return $category;
})->name('category');

require __DIR__.'/auth.php';
