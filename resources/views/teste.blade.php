@extends('layouts.app-layout')


@section('title', 'Bibliotecas Registradas')

@section('content')
    <div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h2 class="text-center mt-5">Bibliotecas Registradas</h2>
        <div class="table-responsive w-75 mx-auto mt-5">
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>FONE</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>AÇÕES</th>
                </thead>
                <tbody>
                    @if (count($libraries) == 0)
                        <tr>
                            <td colspan="6">
                                <h3 class="mt-3 text-center">Nenhuma Biblioteca Cadastrada</h3>
                            </td>
                        </tr>
                    @endif
                    @foreach ($libraries as $lib)
                        <tr>
                            <td>{{ $lib->nome }}</td>
                            <td>{{ $lib->cnpj }}</td>
                            <td>{{ $lib->fone }}</td>
                            <td>{{ $lib->email }}</td>
                            <td>
                                @if ($lib->valida == 0)
                                    Não ativa
                                @else
                                    Ativada
                                @endif
                            </td>
                            <td>
                                @if ($lib->valida == 0)
                                    <button class="btn btn-success" onclick="confirmLib({{ $lib->id }})"><i
                                            class="fas fa-check"></i></button>
                                @else
                                    <button class="btn btn-danger" onclick="declineLib({{ $lib->id }})"><i
                                            class="fas fa-times"></i></button>
                                @endif
                                <button class="btn btn-primary" onclick="verifyLib('{{ $lib->cnpj }}')"><i
                                        class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/libs.js') }}"></script>
@endpush
