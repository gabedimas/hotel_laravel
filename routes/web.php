<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
});

// Controller Login
Route::view('/login', 'form_login');
Route::post('/login/auth',[LoginController::class,'authenticate']);

Route::view('/register', 'register');
Route::post('/register/add',[LoginController::class,'register']);

Route::get('/logout',[LoginController::class,'logout']);
