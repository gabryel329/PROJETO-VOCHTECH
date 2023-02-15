@extends('layouts.app')

@section('title', 'Editar Unidade')

@section('content')
<div class="app-content">
    <h1>
        Editar Unidade {{ $unidade->name }}
    </h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('unidade.update', $unidade->id)}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="razao_social" placeholder="Razão Social" value="{{ $unidade->razao_social }}">
        <input type="text" name="cnpj" placeholder="CNPJ" value="{{ $unidade->cnpj }}">
        <input type="text" name="nome_fantasia" placeholder="Nome Fantasia" value="{{ $unidade->nome_fantasia }}">
        <button type="submit">
            Enviar
        </button>
    </form>
</div>
@endsection
