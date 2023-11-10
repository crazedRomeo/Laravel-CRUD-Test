<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;

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
    return redirect('login');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('tests', TestController::class);
Route::resource('users', UserController::class);

// Route::controller(TestController::class)->group(function() {
//     Route::get('/tests', 'index')->name('tests.index');
//     Route::get('/test/create', 'create')->name('tests.create');
//     Route::get('/test/destroy', 'destroy')->name('tests.destroy');
//     Route::get('/test/show', 'show')->name('tests.show');
//     Route::post('/test/store', 'store')->name('tests.store');
//     Route::post('/test/edit', 'edit')->name('tests.edit');
//     Route::post('/test/update', 'update')->name('tests.update');
// });

// Route::controller(UserController::class)->group(function() {
//     Route::get('/user', 'index')->name('users.index');
//     Route::get('/user/create', 'create')->name('users.create');
//     Route::get('/user/destroy', 'destroy')->name('users.destroy');
//     Route::post('/user/show/{id}', 'show')->name('users.show');
//     Route::post('/user/store', 'store')->name('users.store');
//     Route::post('/user/edit', 'edit')->name('users.edit');
//     Route::post('/user/update', 'update')->name('users.update');
// });
