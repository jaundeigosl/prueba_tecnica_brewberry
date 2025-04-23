<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrewberyController extends Controller
{
    public function index($id){
        return view('brewbery_page', ['id' => $id]);
    }
}