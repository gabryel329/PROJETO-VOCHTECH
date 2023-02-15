@extends('layouts.app')

@section('title', 'Editar Funcionario')

@section('content')
<div class="app-content">
    <h1>
        Editar Funcionario {{ $funcionario->nome }}
    </h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id)}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="nome" placeholder="Nome" value="{{ $funcionario->nome }}">
        <input type="text" name="email" placeholder="E-mail" value="{{ $funcionario->email }}">
        <input type="text" name="idade" placeholder="idade" value="{{ $funcionario->idade }}">
        <input type="text" name="documento" placeholder="Documento" value="{{ $funcionario->documento }}">
        <input type="text" name="unidade_id" placeholder="Unidade" value="{{ $funcionario->unidade_id }}">
        <button type="submit">
            Enviar
        </button>
    </form>
</div>
@endsection
