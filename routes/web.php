<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BlogController::class, 'index']);
//Route::get('/home', [BlogController::class, 'index'])->name('home'); // Custom route


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
//Route::get('/user', function () {
//    return view('welcome');
//});

Route::resource('blog', BlogController::class)->middleware('auth');
//Route::middleware('guest')->group(function () {
//    Route::get('/login', fn() => redirect('/user'));
//    Route::get('/register', fn() => redirect('/user'));
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');
