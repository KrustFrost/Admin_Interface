<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin_Interface\DashboardController;
use App\Http\Controllers\Admin_Interface\UMSController;
use App\Http\Controllers\Admin_Interface\PMSController;
use App\Http\Controllers\Admin_Interface\LMSController;
use App\Http\Controllers\Admin_Interface\CSController;
use App\Http\Controllers\Admin_Interface\AboutController;

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
})->middleware(['guest']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login_active');
Route::post('/logout',[LogoutController::class,'destroy'])->name('logout');
Route::get('/Register',[RegisterController::class,'index'])->name('Register');
Route::post('/Register',[RegisterController::class,'store'])->name('auth.register');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/Profile_Management_System',[PMSController::class,'index'])->name('PMS');

Route::get('/About',[AboutController::class,'index'])->name('About');
Route::get('/Team',[AboutController::class,'Team'])->name('Team');

Route::get('/Profile_Management_System/Profile/{id}',[PMSController::class,'Profile'])->name('PMS_profile');
Route::post('/Profile_Management_System/Profile/{id}',[PMSController::class,'Profile_edit'])->name('PMS_profile_edit');

Route::get('/Library_Management_System',[LMSController::class,'index'])->name('LMS');
Route::get('/Library_Management_System/download/{id}',[LMSController::class,'index_download'])->name('LMS_download');
Route::post('/Library_Management_System/download/{id}',[LMSController::class,'index_download'])->name('LMS_download');
Route::post('/Library_Management_System',[LMSController::class,'index_delete']);
Route::delete('/Library_Management_System/{id}',[LMSController::class,'index_delete']);
Route::get('/Library_Management_System/create',[LMSController::class,'index_create'])->name('lms_create');
Route::post('/Library_Management_System/create',[LMSController::class,'index_create_store'])->name('lms_create_post');

Route::get('/Calendar_System',[CSController::class,'index'])->name('CS');

Route::get('/User_Management_System',[UMSController::class,'index'])->name('UMS');
Route::get('/User_Management_System/create',[UMSController::class,'createview'])->name('umscreateview');
Route::post('/User_Management_System/create',[UMSController::class,'create'])->name('umscreate');
Route::get('/User_Management_System/{id}',[UMSController::class,'updateview']);
Route::post('/User_Management_System/{id}',[UMSController::class,'update'])->name('umsedit');
Route::post('/User_Management_System',[UMSController::class,'delete']);
Route::delete('/User_Management_System/{id}',[UMSController::class,'delete']);

