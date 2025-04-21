<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrewberryController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/brewberry/{id}',[BrewberryController::class, 'index'])->name('cerveceria');
