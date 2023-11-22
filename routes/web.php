<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/',[EmployeeController::class,'index'])->name('home');
Route::get('/dashboard',[EmployeeController::class,'dashboard'])->name('dashboard');
Route::get('/loginpage',[EmployeeController::class,'loginpage'])->name('loginpage');
Route::post('/login',[EmployeeController::class,'login'])->name('login');
Route::post('/register',[EmployeeController::class,'register'])->name('register');
Route::get('/verify/{url}',[EmployeeController::class,'verify'])->name('verify');


