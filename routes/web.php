<?php

use App\Http\Controllers\{
    AlunosController
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

Route::get('/alunos', [AlunosController::class, 'index'])->name('alunos.index');
Route::get('/alunos/{id}', [AlunosController::class, 'show'])->name('alunos.show');


Route::get('/', function () {
    return view('welcome');
});


