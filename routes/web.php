<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('guest');
Route::get('/home', [BlogController::class, 'index']);


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


Route::resource('blog', BlogController::class)->middleware('auth');

Route::post('/blog/{blogId}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::get('/search', [BlogController::class, 'search'])->name('blog.search');


Auth::routes();

