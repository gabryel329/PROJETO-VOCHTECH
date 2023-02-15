@extends('layouts.app')

@section('title', 'Listagem de Unidades')

@section('content')
<div class="app-content">
    <h1>
        Listagem de Funcionarios
    </h1>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive-md">
                <table id="tabela" class="table table-hover thead-light table table-striped table table-bordered">
                    <thead class="text-primary" style="text-align: center;">
                        <tr>
                            <th>
                                Razao Social
                            </th>
                            <th>
                                Nome Fantasia
                            </th>
                            <th>
                                CNPJ
                            </th>
                            <th>
                                Deletar
                            </th>
                            <th>
                                Detalhes
                            </th>
                            <th>
                                Editar
                            </th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($unidades as $unidade)
                            <tr>
                                <td>{{$unidade->razao_social}}</td>
                                <td>{{$unidade->nome_fantasia}}</td>
                                <td>{{$unidade->cnpj}}</td>
                                <td>
                                    <form action="{{ route('unidade.delete', $unidade->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Deletar</button>
                                    </form>
                                </td>
                                <td>
                                    <a href=" {{ route('unidade.show', $unidade->id) }} ">
                                        <button class="btn btn-primary" type="submit">Detalhes</button></a>
                                </td>
                                <td>
                                    <a href=" {{ route('unidade.edit', $unidade->id) }} ">
                                        <button class="btn btn-info" type="submit">Editar</button></a>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

