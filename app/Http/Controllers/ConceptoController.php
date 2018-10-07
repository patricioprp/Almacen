<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conceptos = Concepto::search($request->descripcion)->orderBy('id','ASC')->paginate(7);
        return view('admin.concepto.index')
        ->with('conceptos',$conceptos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.concepto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $concepto = new Concepto($request->all());
        $concepto->save();
        flash("Se creo el Concepto" . $concepto->descripcion . " correctamente!")->important();
        return redirect(route('concepto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concepto = Concepto::find($id);
        return view('admin.concepto.edit')
        ->with('concepto',$concepto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $concepto = Concepto::find($id);
        $concepto->fill($request->all());
        $concepto->save();
        flash("Se actualizo el Concepto  " . $concepto->descripcion . " correctamente!")->warning();
        return redirect(route('concepto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concepto=Concepto::find($id);
        $concepto->forceDelete();
       flash("Se elimino el Concepto: " . $concepto->descripcion . " correctamente!")->error();
        return redirect(route('concepto.index'));
    }
}
