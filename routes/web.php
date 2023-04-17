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

Route::get('/test', function () {
    return view('payments.index');
})->name('test');

Route::group(['middleware' => "auth", 'role' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('home');

    Route::get('logout', [\App\Http\Controllers\AuthController::class, "logout"])->name("logout");

    //  TASKS
//    Route::resource('tasks', \App\Http\Controllers\TasksController::class);
//Route::get('/tasks',[\App\Http\Controllers\TaskController::class, 'getTasks'])->name('tasks');
//Route::get('/tasks/add',[\App\Http\Controllers\TaskController::class, 'getAddTasksPage'])->name('add.task.page');
//Route::post('post/tasks/add',[\App\Http\Controllers\TaskController::class, 'createTask'])->name('create.task');
//Route::get('/edit/tasks',[\App\Http\Controllers\TaskController::class, 'getEditTasksPage'])->name('edit.task.page');


//   USERS
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource("customers", \App\Http\Controllers\CustomerController::class);
    Route::resource("debts", \App\Http\Controllers\DebtController::class);
    Route::resource("payments", \App\Http\Controllers\PaymentController::class);
    Route::resource('roles',\App\Http\Controllers\RoleController::class);
//Route::get('/users',[\App\Http\Controllers\UserController::class, 'getUsers'])->name('users');
//Route::post('/post/user/add',[\App\Http\Controllers\UserController::class, 'creatUser'])->name('create.user');
//Route::get('/user/edit/{id}',[\App\Http\Controllers\UsersController::class, 'edit'])->name('edit.user');
//Route::post('post/user/edit',[\App\Http\Controllers\UserController::class, 'update_user'])->name('users');

});

Route::group(['middleware' => 'dashboard_redirect'], function () {
    Route::get("/", [\App\Http\Controllers\AuthController::class, "getLoginPage"])->name('login');
    Route::get("/register", [\App\Http\Controllers\AuthController::class, "getRegisterPage"])->name('register');
    Route::post("/sign-in", [\App\Http\Controllers\AuthController::class, "signIn"])->name('sign.in');
    Route::post("/sign-up", [\App\Http\Controllers\AuthController::class, "signUp"])->name('sign.up');
});


// post -> insert
// put pach -> update
// delete -> delete
// get -> read
