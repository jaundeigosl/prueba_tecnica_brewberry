<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogInController extends Controller {
    
    public function index(){
        return view('auth.logIn');
    }

    public function post(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|max:20'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');

        }else{
            return back()->withErrors([
                'email' => 'Credenciales invalidas',
            ])->onlyInput('email');
        }
    }

    public function log_out(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

}