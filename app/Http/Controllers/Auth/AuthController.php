<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Models\Library;
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
        $form = $request->only(['nome', 'email', 'data_nasc', 'genero', 'password', 'password_confirmation']);
        $form['password'] = md5($form['password']);


        $user = User::create([
            'nome' => $form['nome'],
            'email' => $form['email'],
            'data_nasc' => $form['data_nasc'],
            'genero' => $form['genero'],
            'password' => $form['password'],
            'adm' => 0
        ]);

        $login = User::where('email', $form['email'])->where('password', $form['password'])->first();

        if($login){
            Auth::guard('user')->loginUsingId($login->id);
            return redirect('/home');
        }

        return redirect()->back();
    }

    public function loginLibraryForm(){
        return view('auth.library_login');
    }

    public function loginLibrary(Request $request){
        dd($request);
    }

    public function registerLibraryForm(){
        return view('auth.library_register');
    }

    public function registerLibrary(Request $request){

        $form = $request->all();
        $form['password'] = md5($form['password']);

        $library = Library::create([
            'nome' => $form['nome'],
            'cnpj' => $form['cnpj'],
            'email' => $form['email'],
            'fone' => $form['fone'],
            'bairro' => $form['bairro'],
            'endereco' => $form['endereco'],
            'numero' => $form['numero'],
            'cidade' => $form['cidade'],
            'password' => $form['password'],
            'uf' => $form['uf'],
            'cep' => $form['cep'],
            'valida' => 0
        ]);

        return redirect()->route('loginLibrary');
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/login');
    }
}
