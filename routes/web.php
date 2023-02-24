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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/tasks',[\App\Http\Controllers\TaskController::class, 'getTasks'])->name('tasks');
//Route::get('/users',[\App\Http\Controllers\UserController::class, 'getUsers'])->name('users');

//Route::post('/post/user/add',[\App\Http\Controllers\UserController::class, 'creatUser'])->name('create.user');
Route::resource('users',\App\Http\Controllers\UsersController::class);
Route::get('/user/edit/{id}',[\App\Http\Controllers\UsersController::class, 'edit'])->name('edit.user');
//Route::post('post/user/edit',[\App\Http\Controllers\UserController::class, 'update_user'])->name('users');
