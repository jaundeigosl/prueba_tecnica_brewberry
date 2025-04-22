<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
                'exists' => $exist
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'response' => 'Error',
                'errrorMessage' => $th->getMessage()
            ]);

        }

    }

}