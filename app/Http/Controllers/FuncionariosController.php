<?php

namespace App\Http\Controllers;

use App\Mail\FuncionarioCriado;
use App\Models\Endereco;
use App\Models\Funcionarios;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios2 = Funcionarios::all();
        $funcionarios = DB::select("SELECT unidades.nome_fantasia,enderecos.rua,enderecos.numero,funcionarios.id, endereco_id, unidade_id, nome, email, idade, documento
                                    FROM public.funcionarios
                                    INNER JOIN enderecos on (enderecos.id = funcionarios.endereco_id)
                                    INNER JOIN unidades on (unidades.id = funcionarios.unidade_id);");
        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $unidades = Unidade::all();
        return view('funcionario.create',compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Endereco $endereco, Funcionarios $funcionario)
    {
        $endereco->cep = $request->get('cep');
        $endereco->rua = $request->get('rua');
        $endereco->bairro = $request->get('bairro');
        $endereco->cidade = $request->get('cidade');
        $endereco->estado = $request->get('uf');
        $endereco->numero = $request->get('numero');
        $endereco->complemento = $request->get('complemento');
        $endereco->save();


        $funcionario->nome = $request->get('nome');
        $funcionario->email = $request->get('email');
        $funcionario->idade = $request->get('idade');
        $funcionario->documento = $request->get('documento');
        $funcionario->unidade_id = $request->get('unidade_id');
        $funcionario->endereco_id = $endereco->id;
        $funcionario->save();

        $email = new FuncionarioCriado(
            $funcionario->nome,
        );
        Mail::to('gabryel329@gmail.com')->send($email);

        return redirect()->route('funcionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$funcionario = Funcionarios::find($id))
            return redirect()->route('funcionario.index');

            $funcionarios = DB::select("SELECT unidades.nome_fantasia,enderecos.rua,enderecos.numero,funcionarios.id, endereco_id, unidade_id, nome, email, idade, documento
            FROM public.funcionarios
            INNER JOIN enderecos on (enderecos.id = funcionarios.endereco_id)
            INNER JOIN unidades on (unidades.id = funcionarios.unidade_id);");

        return view('funcionario.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$funcionario = Funcionarios::find($id))
        return redirect()->route('funcionario.index');

    return view('funcionario.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$funcionario = Funcionarios::find($id))
            return redirect()->route('funcionario.index');

        $funcionario->update($request->all());

        return redirect()->route('funcionario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$funcionario = Funcionarios::find($id))
            return redirect()->route('funcionario.index');

        $funcionario->delete();

        return redirect()->route('funcionario.index');
    }
}
