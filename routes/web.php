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
//comentarios do usuario
Route::delete('/user/{user_id}/delete/{id}', [CommentController::class, 'destroy'])->name('user.comment.delete');
Route::get('/user/{id}/comment/create', [CommentController::class, 'create'])->name('user.comment.create');
Route::get('/user/{user_id}/comment/{comment_id}', [CommentController::class, 'edit'])->name('user.comment.edit');
Route::get('/user/{id}/comment', [CommentController::class, 'index'])->name('user.comment.index');
Route::post('/user/{id}/comment/store', [CommentController::class, 'store'])->name('user.comment.store');
Route::put('/comment/{id}', [CommentController::class, 'update'])->name('user.comment.update');


//usuario
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


