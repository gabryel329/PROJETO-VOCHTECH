@extends('layouts.app')

@section('title', 'Novo Funcionario')

@section('content')
<div class="app-content">
    <h1>
        Novo Funcionario
    </h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('funcionario.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="input-group-addon">Nome </span>
                    <input id="nome" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="form-control input-md"
                        required="" type="text">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <span class="input-group-addon">Email</span>
                    <input id="email" name="email" class="form-control"
                        placeholder="email@email.com"  type="text"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <div class="col-md-2">
                    <span class="input-group-addon">Idade</span>
                    <input id="idade" name="idade" placeholder="Idade" value="{{ old('idade') }}"
                        class="form-control input-md" required="" type="text" maxlength="10">
                </div>
                <div class="col-md-5">
                    <span class="input-group-addon">Documento</span>
                    <input id="documento" name="documento" placeholder="Documento" value="{{ old('documento') }}" class="form-control input-md" type="text"
                        maxlength="12" onkeypress="return onlynumber();">

                </div>
            </div>
            <br><br>
            <div class="col-md-11 control-label">
                <h3 class="help-block">
                     Unidade
                </h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span class="input-group-addon">Selecione a Unidade</span>
                    <select id="unidade_id" name="unidade_id" class="form-control input-md">
                        <option disabled selected style="font-size:18px;color: black;">Escolha
                        </option>
                        @foreach ($unidades as $unidade)
                        <option value="{{$unidade->id}}">{{$unidade->nome_fantasia}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <br><br>
            <div class="col-md-11 control-label">
                <h3 class="help-block">
                     Endereco
                </h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <span class="input-group-addon">CEP</span>
                    <input class="form-control input-md" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                    onblur="pesquisacep(this.value);" />
                </div>
                <div class="col-md-3">
                    <span class="input-group-addon">Rua</span>
                    <input class="form-control input-md" name="rua" type="text" id="rua" size="60" />
                </div>
                <div class="col-md-3">
                    <span class="input-group-addon">Bairro</span>
                    <input class="form-control input-md" name="bairro" type="text" id="bairro" size="40" /></label><br>
                </div>
                <div class="col-md-3">
                    <span class="input-group-addon">Cidade</span>
                    <input class="form-control input-md" name="cidade" type="text" id="cidade" size="40" /></label><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <span class="input-group-addon">Estado</span>
                    <input class="form-control input-md" name="uf" type="text" id="uf" size="2" /></label><br>
                </div>
                <div class="col-md-3">
                    <span class="input-group-addon">IBGE</span>
                    <input class="form-control input-md" name="ibge" type="text" id="ibge" size="8" /></label><br>
                </div>
                <div class="col-md-1">
                    <span class="input-group-addon">Numero</span>
                    <input class="form-control input-md" name="numero" type="text" id="numero" size="8" /></label><br>
                </div>
                <div class="col-md-7">
                    <span class="input-group-addon">Complemento</span>
                    <input class="form-control input-md" name="complemento" type="text" id="complemento" size="8" /></label><br>
                </div>
            </div>
            <br><br>
            <button class="btn btn-success" type="submit" onclick="sendEmail()" value="Send Email">
                Enviar
            </button>
        </form>
</div>
@endsection
<script>

    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP invalido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    };

</script>

