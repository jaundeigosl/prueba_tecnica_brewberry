<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrewberyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogInController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/Home', function(){
    return view('home');
})->middleware('auth')->name('home');

Route::get('/Register', [RegisterController::class,'index'])->name('registrarse');

Route::post('/Register', [RegisterController::class, 'post'])->name('validacion-registro');

Route::post('/Register-checkEmail', [RegisterController::class,'checkEmail'])->name('check-email');

Route::get('/login',[LogInController::class, 'index'])->name('login');

Route::post('/login', [LogInController::class, 'post'])->name('autenticacion-acceso');

Route::get('/Brewbery/{id}',[BrewberyController::class, 'index'])->middleware('auth')->name('cerveceria');