<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\State;
use App\Domicilio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::search($request->apellido)->orderBy('id','ASC')->paginate(7);
        return view('admin.cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::pluck('name','id');
        return view('admin.cliente.create')->with('states',$states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardando el Domicilio del Cliente
        $domicilio = new Domicilio();
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        //Guardando el Cliente
        $cliente = new Cliente($request->all());
        $cliente->domicilio_id = $domicilio->id;
        $cliente->save();
        flash("Se creo el Cliente" . $cliente->nombre . " correctamente!")->important();
        return redirect(route('cliente.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
