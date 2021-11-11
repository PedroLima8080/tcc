@extends('layouts.app-perfil-layout')

@section('title', 'Home')

@section('content')
    <div class="profile mt-5 px-5">
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
                            <hr>
                            <h2 class="card-title ml-md-2">Favoritos</h2>
                            <div class="your-class" id="fav-books">
                                <!--
                                                    <div class="fav-book text-center ml-2 mr-2">your fav book 2</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 3</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 4</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 5</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 6</div>
                                            -->
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
                            <hr>
                            <h2 class="card-title ml-md-2">Favoritos</h2>
                            <div class="your-class" id="fav-books">
                                <!--
                                                    <div class="fav-book text-center ml-2 mr-2">your fav book 2</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 3</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 4</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 5</div>
                                                <div class="fav-book text-center ml-2 mr-2">your fav book 6</div>
                                            -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var $jq = jQuery.noConflict();

        $jq(document).ready(function() {
            let savedBooks = {!! json_encode($savedBooks, JSON_HEX_TAG) !!};
            let i = 1;
            savedBooks.forEach(book => {
                api_unesp.get(
                        `https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=isbn,contains,${book.identification}`
                    )
                    .then(data => {
                        $jq('#fav-books').html($jq('#fav-books').html() +
                            `<div class="fav-book text-center ml-2 mr-2">${data.docs[0].pnx.display.title[0]}</div>`
                        )
                        if (savedBooks.length == i) {
                            $jq('.your-class').slick({
                                infinite: true,
                                slidesToShow: 3,
                                slidesToScroll: 3
                            });
                        }
                        i++
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })

        });
    </script>
@endpush
