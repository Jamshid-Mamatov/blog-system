<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [BlogController::class, 'index'])->name('home'); // Custom route


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/user', function () {
    return view('user.index');
});

Route::resource('blog', BlogController::class);

