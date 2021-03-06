<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Mail\SendMailUser;
use App\Models\Book;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{

    public function profile(){
        if(Auth::guard('user')->check()){
            $perfil = User::where('id', Auth::guard('user')->user()->id)->first();
        }else{
            $perfil = Library::where('id', Auth::guard('library')->user()->id)->first();
        }
        return view('perfil', ['perfil' => $perfil]);
    }

    public function updateProfile(){
        if(Auth::guard('user')->check()){
            $perfil = User::where('id', Auth::guard('user')->user()->id)->first();
        }else{
            $perfil = Library::where('id', Auth::guard('library')->user()->id)->first();
        }
        return view('editar-perfil', ['perfil' => $perfil]);
    }

    public function store(UpdateProfile $request){
        
        if(Auth::guard('user')->check()){
            $data = $request->only('nome', 'data_nasc', 'genero');
            $perfil = User::where('id', Auth::guard('user')->user()->id)->first()->update($data);
            
        }else{
            $data = $request->only('nome', 'data_nasc', 'genero', 'fone', 'cep', 'endereco', 'cidade', 'uf', 'numero', 'bairro');
            $perfil = Library::where('id', Auth::guard('library')->user()->id)->first()->update($data);
        }

        return redirect()->route('profile');
    }
}
