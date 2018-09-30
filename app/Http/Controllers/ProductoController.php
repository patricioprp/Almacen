<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Tipo;
use App\Stock;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::search($request->descripcion)->orderBy('id','ASC')->paginate(7);
        return view('admin.producto.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all()->pluck('show','id');
        return view('admin.producto.create')->with('tipos',$tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        $stock = new Stock();
        $stock->cantidad = $request->cantidad;
        $stock->minimo = $request->minimo;
        $stock->save();
        $producto->stock_id = $stock->id;
        $producto->tipo_id =$request->tipos;
        $producto->save();
        flash("Se creo el Producto: " . $producto->descripcion . " correctamente!")->important();
        return redirect(route('producto.index'));

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
        $producto = Producto::find($id);
        $producto->forceDelete();
       flash("Se elimino el Producto " . $producto->descripcion . " correctamente!")->error();
        return redirect(route('producto.index'));
    }
}
