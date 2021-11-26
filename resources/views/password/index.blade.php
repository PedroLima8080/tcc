@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('requestEmailPassword') }}" id="form" novalidate >
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                SOLICITAR TROCA DE SENHA
            </div>
        </div>

        <div class="form-group row mt-3">
            <div class="col-12">
                <div class="tcc-form-control">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="off"
                        placeholder="Email">
                    <label for="email">Email</label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-login text-white mx-auto">
                Enviar
            </button>
        </div>
    </form>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush