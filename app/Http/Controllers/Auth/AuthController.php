<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginUserForm(){
        return view('auth.login');
    }

    public function loginUser(loginRequest $request){
        $user = $request->only(['email', 'password']);

        if(Auth::attempt(['email'=>$user['email'], 'password'=>$user['password']])){ //valida email e senha e faz login
            return redirect('/home');
        }else{
            return redirect()->back();
        }
    }

    public function registerUserForm(){
        return view('auth.register');
    }

    public function registerUser(registerRequest $request){
        $form = $request->only(['name', 'email', 'password', 'password_confirmation']);
        $password = $form['password'];
        $form['password'] = Hash::make($form['password']);

        $user = User::create($form);

        if(Auth::attempt(['email'=>$user->email, 'password'=>$password])){
            return redirect('/home');
        }

        return redirect()->back();
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/login');
    }
}
