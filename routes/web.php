<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SaveUserController;
use App\Http\Controllers\UserController;
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
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

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
Route::get('profile', [DashboardController::class, 'profileForm'])
    ->middleware(['auth'])->name('profile.form');
Route::post('profile', [DashboardController::class, 'profile'])
    ->middleware(['auth'])->name('profile');

Route::get('/category/{category}', function (Category $category) {
    return $category;
})->name('category');

require __DIR__ . '/auth.php';

// # Nested Attributes Validation

// /** @var \Illuminate\Http\Request $request */

// // Let's say request has some nested field data like this:
// $requestData = [
//     'user' => [
//         'name' => 'Laratips',
//     ],
// ];

// // To validate this, we can use 'dot' syntax like this:
// $request->validate([
//     'user.name' => ['required', 'string'],
// ]);

// // But sometimes, we can also have 'dot' in the field name as well.
// // Let's say request has this data now:
// $requestData = [
//     'v1.0' => true,
//     'user' => [
//         'name' => 'Laratips',
//     ],
// ];

// // In this case, if you use validation like previously, it will look for '0' field inside 'v1'
// // So, to make sure we validate 'v1.0', we need to escape it like this:
// $request->validate([
//     'v1\.0' => ['required'],
//     'user.name' => ['required', 'string'],
// ]);

// You don't need to use job batch here. Only simple Job will work perfectly fine.
// You can do it like this:
// Contacts::select(['id'])
//     ->where('user_id', $user->id)
//     ->where('slug', $to_category)
//     ->where('subscription', 1)
//     ->chunkById(2000, function ($contactIds) {
//         BroadCampaignJob::dispatch($contactIds);
//     });
