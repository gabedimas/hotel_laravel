<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
});


// MANAGEMENT ROUTING
Route::get('/management/list', [ManagementController::class, 'get_list_approval'])->middleware('can:isManager');
Route::get('/management/detail/{booking_id}', [ManagementController::class, 'get_detail_approval'])->middleware('can:isManager');
Route::post('/management/approve', [ManagementController::class, 'approve_booking'])->middleware('can:isManager');


// AUTHENTICATION ROUTING
Route::get('/register', [AuthController::class, 'get_register_menu']);
Route::get('/login', [LoginController::class, 'get_login_menu']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth/register', [LoginController::class, 'register']);
Route::post('/auth/login', [LoginController::class, 'login']);


// ADMIN ROUTING
Route::get('/admin/klasifikasi/list', [AdminController::class, 'get_list_klasifikasi']);
Route::get('/admin/klasifikasi/detail/{klasifikasi_id}', [AdminController::class, 'get_detail_klasifikasi']);
Route::get('/admin/klasifikasi/add', [AdminController::class, 'get_add_klasifikasi_menu']);
Route::post('/admin/klasifikasi/submit', [AdminController::class, 'add_klasifikasi']);
Route::post('/admin/klasifikasi/edit', [AdminController::class, 'edit_klasifikasi']);
Route::get('/admin/klasifikasi/delete/{klasifikasi_id}', [AdminController::class, 'delete_klasifikasi']);


Route::get('/admin/kamar/list', [AdminController::class, 'get_list_kamar']);
Route::get('/admin/kamar/detail/{kamar_id}', [AdminController::class, 'get_detail_kamar']);
Route::get('/admin/kamar/add', [AdminController::class, 'get_add_kamar_menu']);
Route::post('/admin/kamar/submit', [AdminController::class, 'add_kamar']);
Route::post('/admin/kamar/edit', [AdminController::class, 'edit_kamar']);
Route::get('/admin/kamar/delete/{kamar_id}', [AdminController::class, 'delete_kamar']);


Route::get('/admin/user_management/list', [AdminController::class, 'get_list_kamar']);
Route::get('/admin/user_management/detail/{user_id}', [AdminController::class, 'get_detail_user']);
Route::get('/admin/user_management/add', [AdminController::class, 'get_add_user_menu']);
Route::post('/admin/user_management/submit', [AdminController::class, 'add_user']);
Route::post('/admin/user_management/edit', [AdminController::class, 'edit_user']);
Route::get('/admin/user_management/delete/{user_id}', [AdminController::class, 'delete_user']);
