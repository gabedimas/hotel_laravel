<?php

use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
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
    return view('home.main');
});


// ABOUT US ROUTING
Route::get('/about-us', [AboutUsController::class, 'get_menu']);

// ACCOMODATION ROUTING
Route::get('/accomodation', [AccomodationController::class, 'get_menu']);

// BLOG ROUTING
Route::get('/blog', [BlogController::class, 'get_menu']);
Route::get('/blog-details', [BlogController::class, 'get_detail_menu']);

// CONTACT ROUTING
Route::get('/contact', [ContactController::class, 'get_menu']);

// CONTACT ROUTING
Route::get('/gallery', [GalleryController::class, 'get_menu']);


// MANAGEMENT ROUTING
Route::get('/management/list', [ManagementController::class, 'get_list_approval'])->middleware('can:isManager');
Route::get('/management/detail/{booking_id}', [ManagementController::class, 'get_detail_approval'])->middleware('can:isManager');
Route::post('/management/approve', [ManagementController::class, 'approve_booking'])->middleware('can:isManager');


// AUTHENTICATION ROUTING
Route::get('/register', [AuthController::class, 'get_register_menu']);
Route::get('/login', [AuthController::class, 'get_login_menu']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


// ADMIN ROUTING
Route::get('/admin/klasifikasi/list', [AdminController::class, 'get_list_klasifikasi'])->middleware('can:isAdmin');
Route::get('/admin/klasifikasi/detail/{klasifikasi_id}', [AdminController::class, 'get_detail_klasifikasi'])->middleware('can:isAdmin');
Route::get('/admin/klasifikasi/add', [AdminController::class, 'get_add_klasifikasi_menu'])->middleware('can:isAdmin');
Route::post('/admin/klasifikasi/submit', [AdminController::class, 'add_klasifikasi'])->middleware('can:isAdmin');
Route::post('/admin/klasifikasi/edit', [AdminController::class, 'edit_klasifikasi'])->middleware('can:isAdmin');
Route::get('/admin/klasifikasi/delete/{klasifikasi_id}', [AdminController::class, 'delete_klasifikasi'])->middleware('can:isAdmin');


Route::get('/admin/kamar/list', [AdminController::class, 'get_list_kamar'])->middleware('can:isAdmin');
Route::get('/admin/kamar/detail/{kamar_id}', [AdminController::class, 'get_detail_kamar'])->middleware('can:isAdmin');
Route::get('/admin/kamar/add', [AdminController::class, 'get_add_kamar_menu'])->middleware('can:isAdmin');
Route::post('/admin/kamar/submit', [AdminController::class, 'add_kamar'])->middleware('can:isAdmin');
Route::post('/admin/kamar/edit', [AdminController::class, 'edit_kamar'])->middleware('can:isAdmin');
Route::get('/admin/kamar/delete/{kamar_id}', [AdminController::class, 'delete_kamar'])->middleware('can:isAdmin');


Route::get('/admin/user_management/list', [AdminController::class, 'get_list_user'])->middleware('can:isAdmin');
Route::get('/admin/user_management/detail/{user_id}', [AdminController::class, 'get_detail_user'])->middleware('can:isAdmin');
Route::get('/admin/user_management/add', [AdminController::class, 'get_add_user_menu'])->middleware('can:isAdmin');
Route::post('/admin/user_management/submit', [AdminController::class, 'add_user'])->middleware('can:isAdmin');
Route::post('/admin/user_management/edit', [AdminController::class, 'edit_user'])->middleware('can:isAdmin');
Route::get('/admin/user_management/delete/{user_id}', [AdminController::class, 'delete_user'])->middleware('can:isAdmin');
