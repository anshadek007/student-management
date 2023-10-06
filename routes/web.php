<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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



//auth routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//email verify route
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
// Make the 'student' resource controller the default or root URL
Route::redirect('/', '/student')->middleware(['auth', 'is_verify_email']);
//students crud routes
Route::resource('student', StudentController::class)->middleware(['auth', 'is_verify_email']); 

