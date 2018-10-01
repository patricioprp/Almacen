<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\State;
use App\Province;
use App\Location;
use App\Domicilio;
use App\Venta;
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
        $cliente = Cliente::find($id);
        return view('admin.cliente.show')->with('cliente',$cliente);
    }
    public function view($id)
    {
     $ventas = Venta::find($id);
     return view('admin.cliente.view')
     ->with('ventas',$ventas);
    }
    public function viewCC($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        $states = State::pluck('name','id');
        $provinces = Province::pluck('name','id');
        $locations = Location::pluck('name','id');
        return view('admin.cliente.edit')->with('cliente',$cliente)
        ->with('states',$states)->with('provinces',$provinces)->with('locations',$locations);
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
        $cliente=Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        $domicilio = Domicilio::find($request->domicilio);
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        flash("Se actualizo el Cliente  " . $cliente->nombre . " correctamente!")->warning();
        return redirect(route('cliente.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $cliente=Cliente::find($id);
            $cliente->forceDelete();
           flash("Se elimino el Cliente " . $cliente->nombre . " correctamente!")->error();
            return redirect(route('cliente.index'));
        }
    }
}
