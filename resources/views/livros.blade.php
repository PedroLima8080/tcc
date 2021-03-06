@extends('layouts.app-layout')

@section('title', 'Livros')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                </div>
                <div class="generate-abnt">
                    <div>
                        <h2>Gerador de ABNT</h2>
                        <div class="group-abnt">
                            <textarea disabled id="input-abnt" class="input-abnt"></textarea>
                            <button id="btn-abnt-copy"><i class="far fa-copy" id="i-abnt-copy"></i>
                            </button>
                        </div>
                    </div>
                    <div class="right-side">
                    </div>
                </div>
            </div>

        </div>

        <div class="library">
            <h1 class="text-center">Por qual livro você está buscando?</h1>
            <form method="POST" id="searchAdvanced" class="w-100">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="tcc-form-control">
                            <input id="title" type="text" name="title" autocomplete="off" placeholder=" ">
                            <label for="title">Título:</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="tcc-form-control">
                            <input id="autor" type="text" name="autor" autocomplete="off" placeholder=" ">
                            <label for="autor">Autor:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="tcc-form-control">
                            <input id="assunto" type="text" name="assunto" autocomplete="off" placeholder=" ">
                            <label for="assunto">Assunto:</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="tcc-form-control">
                            <input id="isbn" type="text" name="isbn" autocomplete="off" placeholder=" ">
                            <label for="isbn">ISBN:</label>
                        </div>
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
            <div id="pages" class="d-none justify-content-center mb-5">

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/livros.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-library.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        var $jq = jQuery.noConflict();
    </script>
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/livros.js') }}"></script>
    <script src="{{ asset('js/searchHome.js') }}"></script>
@endpush
