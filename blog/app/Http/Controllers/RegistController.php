<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class RegistController extends Controller
{

    public function index(){
        return view('regist.index');
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect('/');
    }
}
