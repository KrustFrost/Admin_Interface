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

Route::get('/login',[LoginController::class,'index'])->middleware(['XSS'])->name('login');
Route::post('/login',[LoginController::class,'store'])->middleware(['XSS'])->name('login_active');
Route::post('/logout',[LogoutController::class,'destroy'])->middleware(['XSS'])->name('logout');
Route::get('/Register',[RegisterController::class,'index'])->middleware(['XSS'])->name('Register');
Route::post('/Register',[RegisterController::class,'store'])->middleware(['XSS'])->name('auth.register');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['XSS'])->name('dashboard');

Route::get('/Profile_Management_System',[PMSController::class,'index'])->middleware(['XSS'])->name('PMS');

Route::get('/About',[AboutController::class,'index'])->middleware(['XSS'])->name('About');
Route::get('/Team',[AboutController::class,'Team'])->middleware(['XSS'])->name('Team');

Route::get('/Profile_Management_System/Profile/{id}',[PMSController::class,'Profile'])->middleware(['XSS'])->name('PMS_profile');
Route::post('/Profile_Management_System/Profile/{id}',[PMSController::class,'Profile_edit'])->middleware(['XSS'])->name('PMS_profile_edit');

Route::get('/Library_Management_System',[LMSController::class,'index'])->middleware(['XSS'])->name('LMS');
Route::get('/Library_Management_System/download/{id}',[LMSController::class,'index_download'])->middleware(['XSS'])->name('LMS_download');
Route::post('/Library_Management_System/download/{id}',[LMSController::class,'index_download'])->middleware(['XSS'])->name('LMS_download');
Route::post('/Library_Management_System',[LMSController::class,'index_delete'])->middleware(['XSS']);
Route::delete('/Library_Management_System/{id}',[LMSController::class,'index_delete'])->middleware(['XSS']);
Route::get('/Library_Management_System/create',[LMSController::class,'index_create'])->middleware(['XSS'])->name('lms_create');
Route::post('/Library_Management_System/create',[LMSController::class,'index_create_store'])->middleware(['XSS'])->name('lms_create_post');

Route::get('/Calendar_System',[CSController::class,'index'])->middleware(['XSS'])->name('CS');

Route::get('/User_Management_System',[UMSController::class,'index'])->middleware(['XSS'])->name('UMS');
Route::get('/User_Management_System/create',[UMSController::class,'createview'])->middleware(['XSS'])->name('umscreateview');
Route::post('/User_Management_System/create',[UMSController::class,'create'])->middleware(['XSS'])->name('umscreate');
Route::get('/User_Management_System/{id}',[UMSController::class,'updateview'])->middleware(['XSS']);
Route::post('/User_Management_System/{id}',[UMSController::class,'update'])->middleware(['XSS'])->name('umsedit');
Route::post('/User_Management_System',[UMSController::class,'delete'])->middleware(['XSS']);
Route::delete('/User_Management_System/{id}',[UMSController::class,'delete'])->middleware(['XSS']);

