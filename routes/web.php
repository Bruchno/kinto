<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::resource('users', 'App\Http\Controllers\UserController');
Route::get('/', [App\Http\Controllers\Front::class, 'main'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])
       ->middleware(\App\Http\Middleware\AdminValid::class)->name('dashboard');
Route::middleware(\App\Http\Middleware\AdminValid::class)->prefix('dashboard')->group(function () {
   Route::resource('category', 'App\Http\Controllers\CategoryController');
   Route::resource('product', 'App\Http\Controllers\ProductController');
   Route::resource('team', 'App\Http\Controllers\TeamsController');
   Route::get('copy_product/{id}', [App\Http\Controllers\ProductController::class, 'copy_product'])->name('product.copy');
   Route::get('myUsers', [App\Http\Controllers\UserController::class, 'index'])->name('users');
   Route::get('admin_edit/{id}', [App\Http\Controllers\UserController::class, 'admin_edit'])->name('admin.edit');
   Route::post('admin_update/{id}', [App\Http\Controllers\UserController::class, 'admin_update'])->name('admin.update');
   Route::post('user_destroy/{id}', [App\Http\Controllers\UserController::class, 'user_destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';
