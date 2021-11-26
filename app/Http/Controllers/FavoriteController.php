<?php

namespace App\Http\Controllers;

use App\Models\FavBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(){
        if(Auth::guard('user')->check()){
            $savedBooks = FavBook::where('id_user', Auth::guard('user')->user()->id)->where('user_or_lib', 0)->get();
        }else if(Auth::guard('library')->check()){
            $savedBooks = FavBook::where('id_user', Auth::guard('library')->user()->id)->where('user_or_lib', 1)->get();
        }
        return view('favoritos', ['savedBooks' => $savedBooks]);
    }
}
