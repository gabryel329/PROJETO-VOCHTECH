@extends('layouts.app')

@section('title', 'Listagem de Unidade')

@section('content')
<div class="app-content">
    <h1>
        Listagem de Unidade {{ $unidade->nome_fantasia}}
    </h1>

    <ul>
        <li>{{ $unidade->razao_social }}</li>
        <li>{{ $unidade->cnpj }}</li>
        <li>{{ $unidade->nome_fantasia }}</li>
    </ul>
    <form action="{{ route('unidade.delete', $unidade->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>
</div>
@endsection
