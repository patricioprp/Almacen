<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Pago_cc;
use App\Venta;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
     $pago = new Pago_cc();
     $venta = Venta::find($id);
     $pago->monto = $venta->monto;
     $pago->fecha = \Carbon\Carbon::now()->format('Y-m-d');
     $pago->venta_id = $venta->id;
     $pago->save();

     return redirect(route('cliente.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $pago = new Pago_cc();
        $pago->fill($request->all());
        $pago->fecha = \Carbon\Carbon::parse($pago->fecha)->format('Y-m-d');
        $pago->save();
        //flash("Se creo el pago de : " . $cliente->nombre. " correctamente!")->success();
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
       return view('admin.pago.show')
       ->with('cliente',$cliente);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago_cc::find($id);
        return view('admin.pago.edit')
        ->with('pago',$pago);
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
       $pago = Pago_cc::find($request->pago_id);
       $pago->monto = $request->monto;
       $pago->fecha = \Carbon\Carbon::parse($pago->fecha)->format('Y-m-d');
       $pago->save();
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
        $pago = Pago_cc::find($id);
        $pago->forceDelete();
       //flash("Se elimino la Venta del Empleado:  " . $venta->user->name . " correctamente!")->error();
        return redirect(route('cliente.index'));
    }
}
