@extends('layouts.app-layout')

@section('title', 'Home')

@section('content')
<div class="home-page">
    <div class="background-image d-flex flex-column">
        <span class="mt-4">Encontre</span>
        <span class="mt-2">seus livros favoritos</span>
        <span class="mt-2">nas nossas bibliotecas!</span>
        <span class="mt-2">Consulte a disponibilidade do livro que</span>
        <span class="mt-2">precisa nas bibliotecas cadastradas</span>
    </div>

    <ul class="topics pt-3 pb-3">
        <li class="topic-item d-flex flex-column justify-content-center align-items-center">
            <h3 class="text-center mt-2">Praticidade</h3>
            <p class="text-justify">Descubra se o seu livro está disponível nas bibliotecas sem sair da sua casa.</p>
        </li>
        <li class="topic-item d-flex flex-column align-items-center">
            <img src="{{ asset('img/topico-diversidade.jpg') }}" alt="">
            <h5 class="text-center mt-2">Diversidade</h5>
            <p class="text-justify">Estão disponíveis livros dos mais variados gêneros.</p>
        </li>
        <li class="topic-item d-flex flex-column align-items-center">
            <img src="{{ asset('img/topico-referencias.jpg') }}" alt="">
            <h5 class="text-center mt-2">Referências</h5>
            <p class="text-justify">As referências no padrão ABNT são geradas automaticamente.</p>
        </li>
        <li class="topic-item d-flex flex-column align-items-center">
            <img src="{{ asset('img/topico-estudos.jpg') }}" alt="">
            <h5 class="text-center mt-2">Estudos</h5>
            <p class="text-justify">Leia artigos que vão te ajudar a fazer os trabalhos com mais excelência.</p>
        </li>
    </ul>

    <div class="library">
        <hr class="mt-5">
        <h1 class="mt-5 text-center">Nossos Livros</h1>
        <form action="" id="search" class="w-100">
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
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/searchHome.js') }}"></script>
@endpush
