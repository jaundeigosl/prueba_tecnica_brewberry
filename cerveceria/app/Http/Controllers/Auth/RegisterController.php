<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    
    public function index(){

        return view('auth.register');
    }

    public function checkEmail(Request $request){

        try{

            $email = $request->email;

            $exist = DB::table('users')->where('email', $email)->exists();

            return response()->json([
                'response' => 'Ok',
                'exist' => $exist
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'response' => 'Error',
                'errrorMessage' => $th->getMessage()
            ]);

        }

    }

    public function post(Request $request){
        
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string|min:2|max:30|alpha',
            'last_name' => 'required|string|min:2|max:30|alpha',
            'password' => 'required|string|min:8|max:20|confirmed'
        ]);

        DB::table('users')->insert([   
            'email' => $request->email ,
            'name' => $request->first_name ,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
    
    }

}