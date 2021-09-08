@extends('layouts.app-layout')


@section('title', 'Livros')

@section('content')
<table class="table mx-auto mt-5">
    <thead>
        <th>Nome</th>
        <th>CNPJ</th>
        <th>FONE</th>
        <th>EMAIL</th>
        <th>STATUS</th>
    </thead>
    <tbody>
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
            </tr>
        @endforeach
    </tbody>
</table>
@endsection