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
        $password = md5($user['password']);

        $login = User::where('email', $user['email'])->where('password', $password)->get()->first();

        if($login){
            Auth::guard('user')->loginUsingId($login->id);
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
        $form['password'] = md5($form['password']);

        $user = User::create($form);

        $login = User::where('email', $form['email'])->where('password', $form['password'])->first();

        if($login){
            Auth::guard('user')->loginUsingId($login->id);
            return redirect('/home');
        }

        return redirect()->back();
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/login');
    }
}
