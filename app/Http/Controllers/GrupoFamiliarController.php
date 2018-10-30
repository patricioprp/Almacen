<?php

namespace App\Http\Controllers;

use App\Grupo_familiar;
use App\User;
use Illuminate\Http\Request;

class GrupoFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user=User::find($id);
        return view('admin.familia.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('admin.familia.create')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familia = new Grupo_familiar($request->all());
        $familia->f_nac= \Carbon\Carbon::parse($familia->f_nac)->format('Y-m-d');
        $familia->save();
        $user = User::find($request->user_id);
        $user->grupo_familiars()->save($familia);
        flash("Se creo el Integrante del Empleado: " . $user->apellido .",".$user->name. " correctamente!")->success();
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo_familiar  $grupo_familiar
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo_familiar $grupo_familiar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo_familiar  $grupo_familiar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia = Grupo_familiar::find($id);
        return view('admin.familia.edit')->with('familia',$familia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo_familiar  $grupo_familiar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $familia = Grupo_Familiar::find($id);
        $familia->f_nac= \Carbon\Carbon::parse($request->f_nac)->format('Y-m-d');
        $familia->nombre = $request->nombre;
        $familia->apellido = $request->apellido;
        $familia->dni = $request->dni;
        $familia->type = $request->type;
        $familia->save();
        flash("Se actualizo el Familiar " . $familia->nombre.",".$familia->apellido. " correctamente!")->warning();
        return redirect(route('user.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo_familiar  $grupo_familiar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $familia=Grupo_familiar::find($id);
        $familia->forceDelete();
        flash("Se elimino el Familiar " . $familia->nombre.",".$familia->apellido. " correctamente!")->error();
        return redirect(route('user.index'));
    }
}
