@extends('layouts.app-layout')

@section('title', 'Livros')

@section('content')
<div class="livros-page">
    <div class="background-image d-flex flex-column">
        <span class="mt-4">Encontre</span>
        <span class="mt-2">seus livros favoritos</span>
        <span class="mt-2">nas nossas bibliotecas!</span>
        <span class="mt-2">Consulte a disponibilidade do livro</span>
        <span class="mt-2">que precisa nas bibliotecas cadastradas</span>
    </div>

    <div class="library">
        <h1 class="text-center">Por qual livro você está buscando?</h1>
        <form method="POST" id="searchAdvanced" class="w-100">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="autor">Autor:</label>
                    <input type="text" class="form-control" id="autor" name="autor">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn-login w-20 mt-3 mb-2 mx-auto">Pesquisar</button>
            </div>
        </form>
        <hr class="mb-5">
        <div id="status" class="mb-5">
        </div>
        <div class="mb-5 show-books" id="teste">
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/livros.css') }}">
<link rel="stylesheet" href="{{ asset('css/main-library.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/searchHome.js') }}"></script>
@endpush
