<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request){
        $data = $request->only('nome', 'data_nasc', 'genero');

        if(Auth::guard('user')->check()){
            $perfil = User::where('id', Auth::guard('user')->user()->id)->first()->update($data);
            
        }else{
            $perfil = Library::where('id', Auth::guard('library')->user()->id)->first()->update($data);
        }

        return redirect()->route('profile');
    }
}
