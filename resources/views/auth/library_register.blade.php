@extends('layouts.app-enter-user')

@section('content')
    <div class="dev">
        <form method="POST" action="{{ route('registerLibrary') }}" id="form_library" novalidate>
            @csrf
            <div class="d-flex justify-content-center">
                <div class="title-login text-center h2 px-4 py-1 text-white">
                    REGISTER
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                        <input id="nome" type="text" name="nome" value="{{ old('nome') }}" autocomplete="off"
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
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
                        <input id="cnpj" type="text" name="cnpj" value="{{ old('cnpj') }}" autocomplete="off"
                            placeholder=" ">
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
                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('cep') ? 'tcc-is-invalid' : '' }}">
                        <input id="cep" type="text" name="cep" value="{{ old('cep') }}" autocomplete="off"
                            placeholder=" ">
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

                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('cidade') ? 'tcc-is-invalid' : '' }}">
                        <input id="cidade" type="text" name="cidade" value="{{ old('cidade') }}" autocomplete="off"
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

                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('uf') ? 'tcc-is-invalid' : '' }}">
                        <input id="uf" type="text" name="uf" value="{{ old('uf') }}" autocomplete="off"
                            placeholder=" ">
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
            </div>

            <div class="form-group row">
                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('bairro') ? 'tcc-is-invalid' : '' }}">
                        <input id="bairro" type="text" name="bairro" value="{{ old('bairro') }}" autocomplete="off"
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

                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('endereco') ? 'tcc-is-invalid' : '' }}">
                        <input id="endereco" type="text" name="endereco" value="{{ old('endereco') }}" autocomplete="off"
                            placeholder=" ">
                        <label for="endereco">Endereço</label>
                    </div>
                    @if ($errors->has('endereco'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('endereco') }}
                            </span>
                        </div>
                    @endif
                </div>

                <div class="col-4">
                    <div class="tcc-form-control {{ $errors->has('numero') ? 'tcc-is-invalid' : '' }}">
                        <input id="numero" type="text" name="numero" value="{{ old('numero') }}" autocomplete="off"
                            placeholder=" ">
                        <label for="numero">Número</label>
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

            <div class="form-group row">
                <div class="col-6">
                    <div class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="off"
                            placeholder=" ">
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
                <div class="col-6">
                    <div class="tcc-form-control {{ $errors->has('fone') ? 'tcc-is-invalid' : '' }}">
                        <input id="fone" type="text" name="fone" value="{{ old('fone') }}" autocomplete="off"
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
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('password') ? 'tcc-is-invalid' : '' }}">
                        <input id="password" type="password" name="password" value="{{ old('password') }}"
                            autocomplete="off" placeholder=" ">
                        <label for="password">Senha</label>
                    </div>
                    @if ($errors->has('password'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('password_confirmation') ? 'tcc-is-invalid' : '' }}">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" autocomplete="off" placeholder=" ">
                        <label for="password_confirmation">Senha</label>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('loginLibrary') }}">
                    Já é registrado?
                </a>
                <br>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    Registrar-se como Usuário
                </a>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-login text-white">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script>
        $(document).ready(function($) {
            $('#cnpj').mask('00.000.000/0000-00').attr('maxlength', 18)
            $('#cep').mask('00000-000').attr('maxlength', 9)
            $('#fone').mask('(00) 00000-0000').attr('maxlength', 15)
        })

        $('#cep').focusout(function() {
            let valueCep = $('#cep').val();
            $.get(`https://viacep.com.br/ws/${valueCep}/json/`, function(data) {
                if(data && data.erro != true){
                    $('#cidade').val(data.localidade)
                    $('#endereco').val(data.logradouro)
                    $('#uf').val(data.uf)
                    $('#bairro').val(data.bairro)
                }else{
                    customMsg('CEP não encontrado!', 'msg-danger')
                }
            });
        })
    </script>
@endpush
