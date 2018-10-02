<?php

namespace App\Http\Controllers;
use App\Cuenta_corriente;
use App\Cliente;
use App\Producto;
use Illuminate\Support\Facades\Auth;
use App\Venta;
use App\User;
use App\Linea_venta;

use Illuminate\Http\Request;

class VentaCuentaCorrienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cliente = Cliente::find($id);
        $productos = Producto::all()->pluck('venta','id');
        return view('admin.ventacc.create')
        ->with('cliente',$cliente)
        ->with('productos',$productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $venta = new Venta($request->all());
        $venta->fecha = \Carbon\Carbon::parse($venta->fecha)->format('Y-m-d');
        $venta->monto = 0;
        $venta->cliente_id= $request->idc;
        $venta->user_id = $user->id;
        $cliente = Cliente::find($request->idc);
        $cliente->ventas()->save($venta);
        $user = User::find($user->id);
        $user->ventas()->save($venta);
        foreach ($request->productos as $idx=> $producto){
            $lv = new Linea_venta();
            $prod = Producto::find($producto);
            $lv->cantidad = $request->cantidad[$idx];
            $lv->subTotal = $prod->precio_venta*$request->cantidad[$idx];
            $lv->producto_id = $prod->id;
            $lv->venta_id = $venta->id;
            $lv->save();
        }
        foreach($venta->lineaVentas as $l){
            $venta->monto = $venta->monto + $l->subTotal;          
            $venta->lineaventas()->save($l);
            }
            $venta->save();
           // dd($venta);
            flash("Se creo la Venta del CLiente: " . $venta->cliente->nombre. " correctamente!")->success();
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
    public function viewCC($id)
    {
    $cc = Cuenta_corriente::find($id);
    return view('admin.cuentacorriente.index')
    ->with('cc',$cc);       
    }
    public function view($id)
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
        $productos = Producto::all()->pluck('full','id');
        $venta = Venta::find($id);
        return view('admin.ventacc.edit')
        ->with('productos',$productos)
        ->with('venta',$venta);
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
        $venta = Venta::find($id);
        $venta->forceDelete();
       flash("Se elimino la Venta del Empleado:  " . $venta->cliente->nombre . " correctamente!")->error();
        return redirect(route('cliente.index'));
    }
}
