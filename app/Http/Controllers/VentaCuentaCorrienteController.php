<?php

namespace App\Http\Controllers;
use App\Cuenta_corriente;
use App\Cliente;
use App\Producto;
use Illuminate\Support\Facades\Auth;
use App\Venta;
use App\User;
use App\Linea_venta;
use App\Stock;
use Barryvdh\DomPDF\Facade as PDF;

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
            $prod = Producto::find($producto);
            $stock=Stock::find($prod->stock_id);
            if($request->cantidad[$idx]<=$stock->cantidad){
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
                    flash("Se creo la Venta del Empleado: " . $venta->user->name. " correctamente y se actualizao la base de datos del producto!")->success();
                    return redirect(route('cliente.index'));
            }
            else {
                $venta->forceDelete();
                flash("Error: la cantidad del producto " . $prod->descripcion. " es superior a su stock existente, STOCK:".$stock->cantidad)->error();
                return redirect(route('cliente.index'));
            }

        }

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
        $cli = $venta->cliente_id;
        return view('admin.ventacc.edit')
        ->with('productos',$productos)
        ->with('venta',$venta)
        ->with('cli',$cli);
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
        foreach ($request->productos as $idx=> $producto){
            $prod = Producto::find($producto);
            $stock=Stock::find($prod->stock_id);
            if($request->cantidad[$idx]<=$stock->cantidad){
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
                $cliente=Cliente::find($request->cli);
                $venta->cliente_id = $cliente->id;
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
                   return redirect(route('cliente.index'));
            }
            else {
                flash("Error: la cantidad del producto " . $prod->descripcion. " es superior a su stock existente, STOCK:".$stock->cantidad)->error();
                return redirect(route('cliente.index'));
            }
        }
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
        return redirect(route('cliente.index'));
    }
    public function pdf($id,$state)
    {
        $venta = Venta::find($id);
        $pdf = PDF::loadView('pdf.ventaCC', compact('venta','state'));
    
        return $pdf->download('Recibo de Ventas.pdf');
    }
}
