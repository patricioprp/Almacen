<?php

namespace App\Http\Controllers;


use App\User;
use App\State;
use App\Province;
use App\Domicilio;
use App\Location;
use App\Detalleliquidacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(7);
        return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::pluck('name','id');
        return view('admin.user.create')->with('states',$states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Guardando el Domicilio del Usuario o Empleado
        $domicilio = new Domicilio();
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        //Guardando el usuario o empleado
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->domicilio_id = $domicilio->id;
        $user->save();
        flash("Se creo el Usuario " . $user->name . " correctamente!")->important();
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
        $user = User::find($id);
        return view('admin.user.show')->with('user',$user);
    }
    public function view($id)
    {
        $dliq = Detalleliquidacion::find($id);
        return view('admin.user.view')->with('dliq',$dliq);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $states = State::pluck('name','id');
        $provinces = Province::pluck('name','id');
        $locations = Location::pluck('name','id');
        return view('admin.user.edit')->with('user',$user)
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
        $user=User::find($id);
        $user->fill($request->all());
        $user->save();
        $domicilio = Domicilio::find($request->domicilio);
        $domicilio->calle = $request->calle;
        $domicilio->barrio = $request->barrio;
        $domicilio->numero = $request->numero;
        $domicilio->location_id = $request->location;
        $domicilio->location->province_id = $request->province;
        $domicilio->location->province->state_id= $request->state;
        $domicilio->save();
        flash("Se actualizo el Usuario  " . $user->name . " correctamente!")->warning();
        return redirect(route('user.index'));
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
            $user=User::find($id);
            $user->forceDelete();
           flash("Se elimino el Usuario  " . $user->name . " correctamente!")->error();
            return redirect(route('user.index'));
        }
    }
}
