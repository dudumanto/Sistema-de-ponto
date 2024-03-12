<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class,'index'])->name('home.login');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/inicio', [UserController::class,'inicio'])->name('inicio');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/marcar-ponto', [UserController::class, 'marcarPonto'])->name('marcar-ponto');
Route::get('/horarios', [UserController::class, 'verHorarios'])->name('ver-horarios');
Route::get('/cadastro', [UserController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/cadastro', [UserController::class, 'register'])->name('user.register');
Route::get('/iniciar', [UserController::class, 'iniciar'])->name('iniciar');