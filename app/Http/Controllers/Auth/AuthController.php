<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Http\Requests\Auth\LoginLibraryRequest;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerLibraryRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginUserForm(){
        $msg = Helper::getCustomMsg();
        return view('auth.login', ['msg' => $msg]);
    }

    public function loginUser(loginRequest $request){
        $user = $request->only(['email', 'password']);
        $password = md5($user['password']);

        $login = User::where('email', $user['email'])->where('password', $password)->get()->first();

        if($login){
            Auth::guard('user')->loginUsingId($login->id);
            Helper::setCustomMsg(['msg-success', 'Login realizado com sucesso!']);
            return redirect('/home');
        }else{
            Helper::setCustomMsg(['msg-danger', 'Email ou senha incorretos!']);
            return redirect()->back();
        }
    }

    public function registerUserForm(){
        $msg = Helper::getCustomMsg();
        return view('auth.register', ['msg' => $msg]);
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
            Helper::setCustomMsg(['msg-success', 'Cadastro realizado com sucesso!']);
            return redirect('/home');
        }

        Helper::setCustomMsg(['msg-danger', 'Falha ao realizar cadastro!']);
        return redirect()->back();
    }

    public function loginLibraryForm(){
        $msg = Helper::getCustomMsg();
        return view('auth.library_login', ['msg' => $msg]);
    }

    public function loginLibrary(LoginLibraryRequest $request){
        $data = $request->only(['cnpj', 'password']);

        $library = Library::where('cnpj', $data['cnpj'])->where('password', md5($data['password']))->where('valida', 1)->first();

        if($library){
            Auth::guard('library')->loginUsingId($library->id);
            Helper::setCustomMsg(['msg-success', 'Logado com sucesso!']);
            return redirect('/home');
        }
        
        Helper::setCustomMsg(['msg-danger', 'Falha ao fazer login!']);
        return redirect()->route('loginLibrary');
    }

    public function registerLibraryForm(){
        $msg = Helper::getCustomMsg();
        return view('auth.library_register', ['msg' => $msg]);
    }

    public function registerLibrary(registerLibraryRequest $request){

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

        Helper::setCustomMsg(['msg-success', 'Cadastro realizado com sucesso!']);
        return redirect()->route('loginLibrary');
    }

    public function logoutUser(Request $request){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        if(Auth::guard('library')->check()){
            Auth::guard('library')->logout();
        }
        $request->session()->flush();
        $request->session()->regenerate();
        Helper::setCustomMsg(['msg-success', 'Logout realizado sucesso!']);
        return redirect('/login');
    }
}
