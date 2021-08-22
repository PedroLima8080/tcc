@extends('layouts.app-layout')

@section('title', 'Livros')

@section('content')
<div class="livros-page">
    <div class="background-image d-flex flex-column">
        <div class="library">
            <span class="mt-5 text-center">Por qual livro você está buscando?</span>
            <!-- <h1 class="mt-5 text-center">Por qual livro você está buscando?</h1> -->
            <form method="POST" id="search" class="w-100">
                <div class="form-group">
                    <label for="title" name="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn-login w-25 mt-3 mb-2 mx-auto">Pesquisar</button>
                </div>
            </form>
            <hr class="mb-5">
            <div id="status" class="">
            </div>
            <div class="show-books" id="teste">
            </div>
        </div>
        <span class="mt-5 text-center">LIVROS EM DESTAQUE</span>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/livros.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/searchHome.js') }}"></script>
@endpush
