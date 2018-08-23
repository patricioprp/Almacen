<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;
use App\User;
use App\Liquidacion;
use App\Detalleliquidacion;

class LiquidacionController extends Controller
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
       $conceptos = Concepto::all()->pluck('full','id');
       $liquidacion = Liquidacion::find($id);
        return view('admin.liquidacion.create')
        ->with('liquidacion',$liquidacion)
        ->with('conceptos',$conceptos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $liquidacion = new Liquidacion($request->all());
        $liquidacion->desde= \Carbon\Carbon::parse($liquidacion->desde)->format('Y-m-d');
        $liquidacion->hasta= \Carbon\Carbon::parse($liquidacion->hasta)->format('Y-m-d');
        $liquidacion->sueldoBruto=0;
        $liquidacion->sueldoNeto=0;
        $user = User::find($request->id);
        $user->liquidacions()->save($liquidacion);
        $dliq = new Detalleliquidacion();
        foreach($request->conceptos as $concepto){
        $cpt = Concepto::find($concepto);
        if($cpt->tipo="haberes"){
            $dliq->subTotalH = $dliq->subTotalH + $cpt->importe*$request->unidades;
            $dliq->subtotalD = $dliq->subtotalD + 0;
 
            //dd($dliq->subTotalH);
        }
        else{
            $dliq->subTotalD = $dliq->subTotalD + $cpt->importe*$request->unidades;
            $dliq->subtotalH = $dliq->subtotalH + 0;
           // dd($dliq->subTotalD);
 
           
        }
        $dliq->concepto_id = $cpt->id; 
        $dliq->unidad = $request->unidades;
        $dliq->liquidacion_id = $liquidacion->id;
        $liquidacion->sueldoBruto = $dliq->subTotalH + $dliq->subTotalD;
        $liquidacion->sueldoNeto = $dliq->subTotalH - $dliq->subTotalD;  
        $liquidacion->user_id = $user->id;

        }
        $liquidacion->save();
        $dliq->save();


        flash("Se creo la Liquidacion del Empleado: " . $liquidacion->user->apellido .",".$liquidacion->user->name. " correctamente!")->success();
        return redirect(route('user.index'));
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
