@extends('layouts.app')

@section('title', 'Nova Unidade')

@section('content')
<div class="app-content">
    <h1>
        Nova Unidade
    </h1>
    <br>
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('unidade.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <span class="input-group-addon">Razao Social</span>
                <input class="form-control input-md" type="text" name="razao_social" placeholder="Razao Social" value="{{ old('razao_social') }}">
            </div>
            <div class="col-md-4">
                <span class="input-group-addon">CNPJ</span>
                <input class="form-control input-md" type="text" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj') }}">
            </div>
            <div class="col-md-4">
                <span class="input-group-addon">Nome Fantasia</span>
                <input class="form-control input-md" type="text" name="nome_fantasia" placeholder="Nome Fantasia" value="{{ old('nome_fantasia') }}">
            </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit">
            Enviar
        </button>
    </form>
</div>
@endsection
