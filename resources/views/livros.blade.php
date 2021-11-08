@extends('layouts.app-layout')

@section('title', 'Livros')

@section('content')
<a name="topo"></a>
<div class="livros-page">
    <div class="background-image d-flex flex-column">
        <span class="mt-4">Encontre</span>
        <span class="mt-2">seus livros favoritos</span>
        <span class="mt-2">nas nossas bibliotecas!</span>
        <span class="mt-2">Consulte a disponibilidade do livro</span>
        <span class="mt-2">que precisa nas bibliotecas cadastradas</span>
    </div>

    <div id="modal-book" class="modal-book">
        <i class="far fa-times-circle" id="button-close-modal-book"></i>
        <h2 class="modal-title-book"></h2>
        <hr>
        <div class="infos-modal">
            <div class="book-info">
                <!--<h2>Informações do Livro</h2>
                <p>
                    <b>Criadores:</b> <br>
                    Pedro <br>
                    Carlos
                </p>
                <p>
                    <b>ISBN:</b> 123123123
                </p>
                <p>
                    <b>Localizações:</b><br>
                    Pedro<br>
                    Carlos
                </p>-->
            </div>
            <div class="generate-abnt">
                <h2>Gerador de ABNT</h2>
                <div class="group-abnt"><textarea id="input-abnt" class="input-abnt"></textarea><i class="far fa-copy" id="abnt-copy"></i></div>
            </div>
        </div>

    </div>

    <div class="library">
        <h1 class="text-center">Por qual livro você está buscando?</h1>
        <form method="POST" id="searchAdvanced" class="w-100">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="autor">Autor:</label>
                    <input type="text" class="form-control" id="autor" name="autor" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="assunto">Assunto:</label>
                    <input type="text" class="form-control" id="assunto" name="assunto" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" autocomplete="off">
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
        <div id="pages" class="d-flex justify-content-center mb-5">

        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/livros.css') }}">
<link rel="stylesheet" href="{{ asset('css/main-library.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/livros.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/searchHome.js') }}"></script>
@endpush