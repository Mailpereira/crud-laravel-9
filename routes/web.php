<?php

use App\Http\Controllers\{
    CommentController,
    UsersController
};
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

Route::get('/user/{id}/comment', [CommentController::class, 'index'])->name('user.comment.index');
Route::get('/user/{id}/comment/create', [CommentController::class, 'create'])->name('user.comment.create');
Route::post('/user/{id}/comment/store', [CommentController::class, 'store'])->name('user.comment.store');

Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.delete');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');



Route::get('/', function () {
    return view('welcome');
});


