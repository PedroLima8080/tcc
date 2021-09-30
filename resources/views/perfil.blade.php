@extends('layouts.app-layout')

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
                            <div class="your-class">
                                <div class="fav-book text-center ml-2 mr-2">
                                    your fav book 1
                                </div>
                                <div class="fav-book text-center ml-2 mr-2">your fav book 2</div>
                                <div class="fav-book text-center ml-2 mr-2">your fav book 3</div>
                                <div class="fav-book text-center ml-2 mr-2">your fav book 4</div>
                                <div class="fav-book text-center ml-2 mr-2">your fav book 5</div>
                                <div class="fav-book text-center ml-2 mr-2">your fav book 6</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(Auth::guard('library')->check())
            <form action="{{ route('profile') }}" method="POST" class="mt-4">
                @csrf

                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                            <input id="nome" type="text" name="nome"
                                value="{{ old('nome') ? old('nome') : $perfil['nome'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="nome">Nome</label>
                        </div>
                        @if ($errors->has('nome'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('nome') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                            <input id="email" type="email" name="email" value="{{ $perfil['email'] }}" autocomplete="off"
                                placeholder=" " disabled>
                            <label for="email">Email</label>
                        </div>
                        @if ($errors->has('email'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('email') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
                            <input id="cnpj" type="text" name="cnpj" value="{{ $perfil['cnpj'] }}" autocomplete="off"
                                placeholder=" " disabled>
                            <label for="cnpj">CNPJ</label>
                        </div>
                        @if ($errors->has('cnpj'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('cnpj') }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('fone') ? 'tcc-is-invalid' : '' }}">
                            <input id="fone" type="text" name="fone"
                                value="{{ old('fone') ? old('fone') : $perfil['fone'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="fone">Telefone</label>
                        </div>
                        @if ($errors->has('fone'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('fone') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('cep') ? 'tcc-is-invalid' : '' }}">
                            <input id="cep" type="text" name="cep" value="{{ old('cep') ? old('cep') : $perfil['cep'] }}"
                                autocomplete="off" placeholder=" ">
                            <label for="cep">CEP</label>
                        </div>
                        @if ($errors->has('cep'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('cep') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('cidade') ? 'tcc-is-invalid' : '' }}">
                            <input id="cidade" type="text" name="cidade"
                                value="{{ old('cidade') ? old('cidade') : $perfil['cidade'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="cidade">Cidade</label>
                        </div>
                        @if ($errors->has('cidade'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('cidade') }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('endereco') ? 'tcc-is-invalid' : '' }}">
                            <input id="endereco" type="text" name="endereco"
                                value="{{ old('endereco') ? old('endereco') : $perfil['endereco'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="endereco">Endereco</label>
                        </div>
                        @if ($errors->has('endereco'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('endereco') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="tcc-form-control {{ $errors->has('bairro') ? 'tcc-is-invalid' : '' }}">
                            <input id="bairro" type="text" name="bairro"
                                value="{{ old('bairro') ? old('bairro') : $perfil['bairro'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="bairro">Bairro</label>
                        </div>
                        @if ($errors->has('bairro'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('bairro') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <div class="tcc-form-control {{ $errors->has('uf') ? 'tcc-is-invalid' : '' }}">
                            <input id="uf" type="text" name="uf" value="{{ old('uf') ? old('uf') : $perfil['uf'] }}"
                                autocomplete="off" placeholder=" ">
                            <label for="uf">UF</label>
                        </div>
                        @if ($errors->has('uf'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('uf') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <div class="tcc-form-control {{ $errors->has('numero') ? 'tcc-is-invalid' : '' }}">
                            <input id="numero" type="text" name="numero"
                                value="{{ old('numero') ? old('numero') : $perfil['numero'] }}" autocomplete="off"
                                placeholder=" ">
                            <label for="numero">Numero</label>
                        </div>
                        @if ($errors->has('numero'))
                            <div class="tcc-invalid-feedback">
                                <span>
                                    {{ $errors->first('numero') }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-login text-white">
                        Salvar
                    </button>
                </div>
            </form>
        @endif
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@push('scripts')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.your-class').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    </script>
@endpush
