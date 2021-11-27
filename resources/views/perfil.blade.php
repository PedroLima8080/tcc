@extends('layouts.app-layout')

@section('title', 'Home')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="profile mt-5">
        @if (Auth::guard('user')->check())
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Perfil</h2>
                            <div class="row pb-5 pt-5 d-flex align-items-center">
                                <div class="col-md-4 d-flex justify-content-center">
                                    <img style="max-height: 150px" src="{{ asset('img/user.png') }}" alt="">
                                </div>
                                <div class="col-md-7 profile-data">
                                    <div class="form-group">
                                        <h4 class="mt-3">{{ $perfil->nome }}</h4>
                                        <h4 class="mt-3">{{ $perfil->email }}</h4>
                                        <h4 class="mt-3">
                                            {{ str_replace('-', '/', date('d-m-Y', strtotime($perfil->data_nasc))) }}
                                        </h4>
                                        <div class="d-flex align-items-center">
                                            @if ($perfil->genero == 'masculino')
                                                <img src="{{ asset('img/sexo-masculino.png') }}" alt="">
                                            @elseif($perfil->genero == "feminino")
                                                <img src="{{ asset('img/simbolo-feminino.png') }}" alt="">
                                            @elseif($perfil->genero == "outro")
                                                <img src="{{ asset('img/nao-binario.png') }}" alt="">
                                            @endif
                                            <h4>{{ ucfirst($perfil->genero) }}</h4>
                                        </div>
                                    </div>
                                    <button onclick="location.href = `{{ route('edit-profile') }}`"
                                        class="btn-edit-profile"><i class="fas fa-pencil-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::guard('library')->check())
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Perfil</h2>
                            <div class="row pb-5 pt-5 d-flex align-items-center">
                                <div class="col-md-4 d-flex justify-content-center">
                                    <img style="max-height: 150px" src="{{ asset('img/user.png') }}" alt="">
                                </div>
                                <div class="col-md-7 profile-data">
                                    <div class="form-group">
                                        <h4 class="mt-3">Nome: {{ $perfil->nome }}</h4>
                                        <h4 class="mt-3">Email: {{ $perfil->email }}</h4>
                                        <h4 class="mt-3">CNPJ: {{ $perfil->cnpj }}</h4>
                                        <h4 class="mt-3">CEP: {{ $perfil->cep }}</h4>
                                    </div>
                                    <button onclick="location.href = `{{ route('edit-profile') }}`"
                                        class="btn-edit-profile"><i class="fas fa-pencil-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/livros.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endpush
