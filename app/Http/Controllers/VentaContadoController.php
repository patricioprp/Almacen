<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Venta;
use App\User;
use App\Cliente;
use App\Linea_venta;
use App\Stock;

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
            $stock=Stock::find($prod->stock_id);
            $stock->cantidad = $stock->cantidad-$request->cantidad[$idx];
            $stock->save();
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
        $productos = Producto::all()->pluck('full','id');
        $venta = Venta::find($id);
        return view('admin.venta.edit')
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
        //dd($request->all());
        $user = Auth::user();
        $v = venta::find($id);
        foreach($v->lineaVentas as $lv){
            $prod=Producto::find($lv->producto_id);
            $stock =Stock::find($prod->stock_id);
            $stock->cantidad = $stock->cantidad+$lv->cantidad;
            $stock->save();
            $lv->save();
            }
        $v->forceDelete();
        $venta = new Venta($request->all());
        $venta->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $venta->monto = 0 ;
        $venta->user_id = $user->id;
        $cliente=Cliente::find(15);
        $venta->cliente_id = $cliente->id;//se le asigna el cliente generico
        $cliente->ventas()->save($venta);
        foreach ($request->productos as $idx=> $producto){
            $prod = Producto::find($producto);
            $lv = new Linea_venta(); 
            $lv->cantidad = $request->cantidad[$idx];
            $lv->subTotal = $prod->precio_venta*$request->cantidad[$idx];
            $lv->producto_id = $prod->id;
            $lv->venta_id = $venta->id;
            $stock=Stock::find($prod->stock_id);
            $stock->cantidad = $stock->cantidad-$request->cantidad[$idx];
            $stock->save();
            $lv->save();
           }
           foreach($venta->lineaVentas as $lv){
            $venta->monto = $venta->monto + $lv->subTotal;         
            $venta->lineaVentas()->save($lv);
            }
            $venta->save();
           flash("Se edito la Venta del Empleado: " . $venta->user->name. " y se actualizo el stock correctamente!")->success();
           return redirect(route('ventaContado.index'));
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

        foreach($venta->lineaVentas as $l){
            $prod=Producto::find($l->producto_id);
            $stock =Stock::find($prod->stock_id);
            $stock->cantidad = $stock->cantidad+$l->cantidad;
            $stock->save();
            $l->save();
            }

        $venta->forceDelete();
       flash("Se elimino la Venta del Empleado:  " . $venta->user->name . " correctamente!")->error();
        return redirect(route('ventaContado.index'));
    }
}
 