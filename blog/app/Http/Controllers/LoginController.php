<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    function checkLogin(Request $request){
        $this->validate($request,[
                'email'       => 'required|email',
                'password'    => 'required|alphaNum:8',
         ]);

        $user_data = array(
            'email'        => $request->get('email'),
            'password'     => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('/home');
        }else{
            return redirect()->back()->withErrors('Sikeretelen bejelentkezés');
        }
    }

    function goToHome(){
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('login.index');
        }
    }
}
