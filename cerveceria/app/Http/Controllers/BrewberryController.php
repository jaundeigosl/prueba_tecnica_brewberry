<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrewberryController extends Controller
{
    public function index($id){

        return view('brewberry_page', ['id' => $id]);
    }
}