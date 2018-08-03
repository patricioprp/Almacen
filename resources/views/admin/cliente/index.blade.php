@extends('admin.template.main')
@section('title','Listado de  Clientes')
@section('content')
@section('cliente','active')
<h3><b>Modulo de Gestion de Cliente</b></h3>
<a href="{{ asset('admin/cliente/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
   {{-- Buscador de empleado --}}
   {!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'autocomplete' => 'off',
   'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
   <div class="input-group">
       {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

       <div class="input-group-btn">
           <button type="submit" form="formSearch" class="btn btn-default">
               <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
           </button>
       </div>
   </div>
{!! Form::close() !!}
<div class="col-xs-12">
<div class="table-responsive">
  <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
    <thead>
      <th>#</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>DNI</th>
      <th>ESTADO</th>
      <th>TELEFONO</th>
      <th>PAIS</th>
      <th>PROVINCIA</th>
      <th>LOCALIDAD</th>
      <th>BARRIO</th>
      <th>CALLE</th>
      <th>NUMERO</th>
      <th>ACCION</th>
    </thead>
    <tbody>
      @foreach ($clientes as $cliente)
         <tr>
           <td>{{$cliente->id}}</td>
           <td>{{$cliente->nombre}}</td>
           <td>{{$cliente->apellido}}</td>
           <td>{{$cliente->dni}}</td>
           <td>{{$cliente->estado}}</td>
           <td>{{$cliente->telefono}}</td>
           <td>{{$cliente->domicilio->location->province->state->name}}</td>
           <td>{{$cliente->domicilio->location->province->name}}</td>
           <td>{{$cliente->domicilio->location->name}}</td>
           <td>{{$cliente->domicilio->barrio}}</td>
           <td>{{$cliente->domicilio->calle}}</td>
           <td>{{$cliente->domicilio->numero}}</td>
         <td><a href="{{route('admin.cliente.destroy',$cliente->id)}}" onclick="return confirm('Desea eliminar a {{$cliente->name}}{{$cliente->apellido}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="{{route('cliente.edit',$cliente->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
         </tr>
      @endforeach

    </tbody>
  </table>
  </div>
  </div>
  <p></p>
{!! $clientes->render() !!}
@endsection