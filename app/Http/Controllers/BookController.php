<?php

namespace App\Http\Controllers;

use app\Models\Book;
use app\Http\Controllers\BookController;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function save(Request $request){
            $book = Book::create([
                'identification' => $request->isbn[0],
                'id_user' => auth()->user()->id,
            ]);
    }
}
