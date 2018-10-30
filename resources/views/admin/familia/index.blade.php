@extends('admin.template.main')
@section('title','Listado de  Grupo familiar')
@section('content')
@section('usuario','active')
<h3><b>Modulo de Gestion de Grupo Familiar</b></h3>
<div class="panel-heading"><h3><p>Empleado: <h2>{{$user->name}}  {{$user->apellido}}  </h2></p></h3>
</div>   <a href="{{ route('admin.familia.create',$user->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Integrante</span></a>
<div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
        <thead>
          <th>#</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>DNI</th>
          <th>EDAD</th>
          <th>TIPO DE RELACION</th>
          <th>ACCION</th>
        </thead>
        <tbody>
          @foreach ($user->grupo_familiars as $familiar)
             <tr>
               <td>{{$familiar->id}}</td>
               <td>{{$familiar->nombre}}</td>
               <td>{{$familiar->apellido}}</td>
               <td>{{$familiar->dni}}</td>
               <td>{{\Carbon\Carbon::parse($familiar->f_nac)->format('d-m-Y')}}</td>
               <td>{{$familiar->type}}</td>
               <td><a href="{{route('admin.familia.destroy',$familiar->id)}}" onclick="return confirm('Desea eliminar a {{$user->name}}{{$user->apellido}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                <a href="{{route('familia.edit',$familiar->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              </td>
             </tr>
          @endforeach
    
        </tbody>
      </table>
      </div>
      </div>
@endsection