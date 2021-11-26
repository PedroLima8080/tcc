<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\FavBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function save(Request $request)
    {
        try {
            if(Auth::guard('user')->check()){
                $book = FavBook::create([
                    'identification' => $request->isbn[0],
                    'id_user' => Auth::guard('user')->user()->id,
                ]);
            }else if(Auth::guard('library')->check()){
                $book = FavBook::create([
                    'identification' => $request->isbn[0],
                    'id_user' => Auth::guard('library')->user()->id,
                    'user_or_lib' => 1
                ]);
            }

            return response(['book' => $book, 'success' => true]);
        } catch (\PDOException $e) {
            return response(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function hasBook(Request $request)
    {
        $data = $request->all();
        $isbn = $data['isbn'];
        try {
            if(Auth::guard('user')->check()){
                $book = FavBook::where('id_user', Auth::guard('user')->user()->id)->where('identification', $isbn)->where('user_or_lib', 0)->first();
            }else if(Auth::guard('library')->check()){
                $book = FavBook::where('id_user', Auth::guard('library')->user()->id)->where('identification', $isbn)->where('user_or_lib', 1)->first();
            }

            return response(['book' => $book, 'success' => true]);
        } catch (\PDOException $e) {
            return response(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function removeBook(Request $request)
    {
        $data = $request->all();
        $isbn = $data['isbn'];
        try {
            if(Auth::guard('user')->check()){
                $book = FavBook::where('id_user', Auth::guard('user')->user()->id)->where('identification', $isbn)->where('user_or_lib', 0)->first();
            }else{
                $book = FavBook::where('id_user', Auth::guard('library')->user()->id)->where('identification', $isbn)->where('user_or_lib', 1)->first();
            }
            if($book){
                $book->delete();
                return response(['book' => $book, 'success' => true]);
            }
        } catch (\PDOException $e) {
            return response(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
