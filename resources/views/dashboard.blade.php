@extends('layouts.app-layout')

@section('title', 'Home')

@section('content')
    <form method="POST" action="{{ route('logout') }}" class="form">
        @csrf

        <div class="title-login text-center text-white">
            {{Auth::user()->name}}
        </div>

        <div class="col-12 d-flex justify-content-center mt-5">
            <button class="btn btn-login text-white">
                Log out
            </button>
        </div>
    </form>
@endsection
