<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrewberryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogInController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/Register', [RegisterController::class,'index'])->name('registrarse');

Route::post('/Register-checkEmail', [RegisterController::class,'checkEmail'])->name('check-email');

Route::post('/Register', [RegisterController::class, 'post'])->name('validacion-registro');

Route::get('/Acceder',[LogInController::class, 'index'])->name('acceder');

Route::post('/Acceder', [LogInController::class, 'post'])->name('autenticacion-acceso');

Route::get('/Home', function(){
    return view('home');
})->name('home');

Route::get('/Brewberry/{id}',[BrewberryController::class, 'index'])->name('cerveceria');
