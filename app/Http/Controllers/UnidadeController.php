<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUnidadeFormRequest;
use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidade::all();

        return view('unidade.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unidade::create($request->all());

        return redirect()->route('unidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$unidade = Unidade::find($id))
            return redirect()->route('unidade.index');

        return view('unidade.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$unidade = Unidade::find($id))
        return redirect()->route('unidade.index');

    return view('unidade.edit', compact('unidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$unidade = Unidade::find($id))
            return redirect()->route('unidade.index');

        $unidade->update($request->all());

        return redirect()->route('unidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$unidade = Unidade::find($id))
            return redirect()->route('unidade.index');

        $unidade->delete();

        return redirect()->route('unidade.index');
    }
}
