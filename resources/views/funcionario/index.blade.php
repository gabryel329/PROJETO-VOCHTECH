@extends('layouts.app')

@section('title', 'Listagem de Funcionarios')

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
                                Nome
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Idade
                            </th>
                            <th>
                                Documento
                            </th>
                            <th>
                                Endereco/Rua
                            </th>
                            <th>
                                Unidade
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
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{$funcionario->nome}}</td>
                                <td>{{$funcionario->email}}</td>
                                <td>{{$funcionario->idade}}</td>
                                <td>{{$funcionario->documento}}</td>
                                <td>{{$funcionario->rua}}</td>
                                <td>{{$funcionario->nome_fantasia}}</td>
                                <td>
                                    <form action="{{ route('funcionario.delete', $funcionario->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Deletar</button>
                                    </form>
                                </td>
                                <td>
                                    <a href=" {{ route('funcionario.show', $funcionario->id) }} ">
                                        <button class="btn btn-primary" type="submit">Detalhes</button></a>
                                </td>
                                <td>
                                    <a href=" {{ route('funcionario.edit', $funcionario->id) }} ">
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
