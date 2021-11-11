<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function save(Request $request)
    {
        try {
            $book = Book::create([
                'identification' => $request->isbn[0],
                'id_user' => Auth::guard('user')->user()->id,
            ]);

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
            $book = Book::where('id_user', Auth::guard('user')->user()->id)->where('identification', $isbn)->first();

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
            $book = Book::where('id_user', Auth::guard('user')->user()->id)->where('identification', $isbn)->first();
            if($book){
                $book->delete();
                return response(['book' => $book, 'success' => true]);
            }
        } catch (\PDOException $e) {
            return response(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
