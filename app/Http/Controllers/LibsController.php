<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibsController extends Controller
{
    public function sla(){
        $libraries = Library::all();
        return view('teste', ['libraries' => $libraries]);
    }
}
