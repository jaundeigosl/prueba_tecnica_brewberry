<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/brewberry/{id}', function($id){
    return view('brewberry_page',['id' => $id]);
})->name('cerveceria');
