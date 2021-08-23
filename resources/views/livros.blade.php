@extends('layouts.app-layout')

@section('title', 'Livros')

@section('content')
<div class="livros-page">
    <div class="library">
        <h1 class="mx-auto main-title">Por qual livro você está buscando?</h1>
        <form method="POST" id="searchAdvanced" class="w-100">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title" name="title" class="text-white custom-label">Título:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="title" name="title" class="text-white custom-label">Autor:</label>
                    <input type="text" class="form-control" id="autor" name="autor">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn-login w-20 mt-3 mb-2 mx-auto">Pesquisar</button>
            </div>
        </form>
        <div id="status" class="mt-5">
        </div>
        <div class="show-books" id="teste">
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
