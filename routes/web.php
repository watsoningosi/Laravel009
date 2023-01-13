<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/pages/payment', [App\Http\Controllers\PaymentController::class, 'create'])->middleware('auth');
Route::post('/pages/payment', [App\Http\Controllers\PaymentController::class, 'store'])->middleware('auth');

Route::get('/pages/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
#Route::get('/pages/contact', [App\Http\Controllers\ContactController::class, 'create']);
Route::post('/pages/contact', [App\Http\Controllers\ContactController::class, 'store']);

Route::get('/pages/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('pages.admin')->middleware('admin');
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/pages/blog/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('blog');
Route::get('/pages/blog', [App\Http\Controllers\PostController::class, 'index'])->name('tag');
Route::post('/pages/create', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/pages/create', [App\Http\Controllers\PostController::class, 'create']);
Route::get('/pages/blog/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/pages/blog/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/pages/admin/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

Route::get('/pages/foo', function () {
    return view('pages/foo');
});

Route::get('/pages/users', [App\Http\Controllers\UserController::class, 'index'])->name('pages.users');
Route::post('/pages/newuser', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/pages/newuser', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/pages/users/{user}/edituser', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/pages/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/pages/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
