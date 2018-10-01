<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Venta;
use App\User;
use App\Cliente;
use App\Linea_venta;

use Illuminate\Http\Request;

class VentaContadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::orderBy('id','ASC')->paginate(7);
        return view('admin.venta.index')
        ->with('ventas',$ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all()->pluck('venta','id');
        $user = Auth::user();
        return view('admin.venta.create')
        ->with('productos',$productos)
        ->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta($request->all());
        $venta->fecha = \Carbon\Carbon::parse($venta->fecha)->format('Y-m-d');
        $venta->monto = 0;
        $venta->cliente_id= 10;
        $venta->user_id = $request->idu;
        $cliente = Cliente::find(10);
        $cliente->ventas()->save($venta);
        $user = User::find($request->idu);
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
            flash("Se creo la Venta del Empleado: " . $venta->user->name. " correctamente!")->success();
            return redirect(route('ventaContado.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
        return view('admin.venta.show')->with('venta',$venta);
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
        $venta = Venta::find($id);
        $venta->forceDelete();
       flash("Se elimino la Venta del Empleado:  " . $venta->user->name . " correctamente!")->error();
        return redirect(route('ventaContado.index'));
    }
}
 