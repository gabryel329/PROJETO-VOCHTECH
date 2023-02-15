@extends('layouts.app')

@section('title', 'Listagem de Funcionario')

@section('content')
<div class="app-content">
    <h1>
        Listagem de Funcionario {{ $funcionario->nome}}
    </h1>

    <ul>

        <li>{{ $funcionario->nome }}</li>
        <li>{{ $funcionario->email }}</li>
        <li>{{ $funcionario->idade }}</li>
        <li>{{ $funcionario->documento }}</li>
        <li>{{ $funcionario->rua }}</li>
        <li>{{ $funcionario->nome_fantasia }}</li>
    </ul>
    <form action="{{ route('funcionario.delete', $funcionario->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Deletar</button>
    </form>
</div>
@endsection
