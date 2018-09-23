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
       $user = User::find($id);
        return view('admin.liquidacion.create')
        ->with('user',$user)
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
        $liquidacion = new Liquidacion($request->all());
        $liquidacion->desde= \Carbon\Carbon::parse($liquidacion->desde)->format('Y-m-d');
        $liquidacion->hasta= \Carbon\Carbon::parse($liquidacion->hasta)->format('Y-m-d');
        $liquidacion->sueldoBruto=0;
        $liquidacion->sueldoNeto=0;
        $user = User::find($request->id);
        //dd($request->all());
		$user->liquidacions()->save($liquidacion);
		//dd($request->conceptos);
        foreach ($request->conceptos as $idx=> $concepto){
          // dump($concepto);
        $dliq = new Detalleliquidacion();
        $cpt = Concepto::find($concepto);

        if($cpt->tipo=="haberes"){
            $dliq->subTotalH = $cpt->importe*$request->unidades[$idx];
            $dliq->subtotalD =  0; 
            dump($request->unidades[$idx]);
        }
        else{
            $dliq->subTotalD =  $cpt->importe*$request->unidades[$idx];
            $dliq->subtotalH =  0;           
        }

        $dliq->concepto_id = $cpt->id; 
        $dliq->unidad = $request->unidades[$idx];
        $dliq->liquidacion_id = $liquidacion->id;
        $dliq->save();
        }
        foreach($liquidacion->detalleliquidacions as $d){
        $liquidacion->sueldoBruto = $liquidacion->sueldoBruto + $d->subTotalH + $d->subTotalD;
        $liquidacion->sueldoNeto = $liquidacion->sueldoNeto + $d->subTotalH - $d->subTotalD;        
        $liquidacion->user_id = $user->id;

        $liquidacion->detalleliquidacions()->save($d);
        }
        $liquidacion->save();
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
        $conceptos = Concepto::all()->pluck('full','id');
        $liquidacion = Liquidacion::find($id);
        $liquidacion->concepto;
        return view('admin.liquidacion.edit')
        ->with('liquidacion',$liquidacion)
        ->with('conceptos',$conceptos);
        
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
       $liquidacion = Liquidacion::find($id);
       $liquidacion->desde = \Carbon\Carbon::parse($request->desde)->format('Y-m-d');
       $liquidacion->hasta = \Carbon\Carbon::parse($request->hasta)->format('Y-m-d');
       $liquidacion->periodo = $request->periodo;
       $liquidacion->estado = $request->estado;
       $liquidacion->sueldoBruto=0;
       $liquidacion->sueldoNeto=0;
         if(sizeof($liquidacion->detalleliquidacions)==sizeof($request->conceptos)){
            foreach ($request->conceptos as $idx=> $concepto){
                $cpt = Concepto::find($concepto);
                $dliq = DetalleLiquidacion::find($liquidacion->detalleliquidacions[$idx]);                            
                if($cpt->tipo=="haberes"){
                    $dliq[0]->subTotalH = $cpt->importe*$request->unidades[$idx];
                    $dliq[0]->subTotalD = 0;                       
                }
                else{
                    $dliq[0]->subTotalH =  0;   
                    $dliq[0]->subTotalD =  $cpt->importe*$request->unidades[$idx];                          
                }            
                $dliq[0]->concepto_id = $cpt->id; 
                $dliq[0]->unidad = $request->unidades[$idx];
                $dliq[0]->liquidacion_id = $liquidacion->id;                      
                $liquidacion->detalleliquidacions()->save($dliq[0]);       
                $liquidacion->sueldoBruto = $liquidacion->sueldoBruto + $dliq[0]->subTotalH + $dliq[0]->subTotalD;
                $liquidacion->sueldoNeto = $liquidacion->sueldoNeto + $dliq[0]->subTotalH - $dliq[0]->subTotalD; 
                $liquidacion->save();                                   
            }
            flash("Se edito la Liquidacion del Empleado: " . $liquidacion->user->apellido .",".$liquidacion->user->name. " correctamente!")->success();
            return redirect(route('user.index'));
 
        }
         elseif(sizeof($liquidacion->detalleliquidacions) > sizeof($request->conceptos))
             dd("el original es mayor q el actual");
         else
             dd("el original es menor q el actual");



       foreach($liquidacion->detalleliquidacions as $dl){
        if($liquidacion->detalleliquidacions){
            dump("es verdadero");
        }
        if($liquidacion->detalleliquidacions=="null"){
            dump("es falso");
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
        $liquidacion=Liquidacion::find($id);
        $liquidacion->forceDelete();
        flash("Se elimino Liquidacion de  " . $liquidacion->user->nombre.",".$liquidacion->user->apellido. " correctamente!")->error();
        return redirect(route('user.index'));
    }
}
