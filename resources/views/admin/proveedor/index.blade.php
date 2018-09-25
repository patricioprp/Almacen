@extends('admin.template.main')
@section('title','Listado de  Proveedores')
@section('content')
@section('proveedor','active')
<h3><b>Modulo de Gestion de Proveedor</b></h3>
<a href="{{ asset('admin/proveedor/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
   {{-- Buscador de proveedor --}}
   {!! Form::open(['route' => 'proveedor.index', 'method' => 'GET', 'autocomplete' => 'off',
   'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
   <div class="input-group">
       {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

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
          @foreach ($proveedores as $proveedor)
             <tr>
               <td>{{$proveedor->id}}</td>
               <td>{{$proveedor->nombre}}</td>
               <td>{{$proveedor->telefono}}</td>
               <td>{{$proveedor->domicilio->location->province->state->name}}</td>
               <td>{{$proveedor->domicilio->location->province->name}}</td>
               <td>{{$proveedor->domicilio->location->name}}</td>
               <td>{{$proveedor->domicilio->barrio}}</td>
               <td>{{$proveedor->domicilio->calle}}</td>
               <td>{{$proveedor->domicilio->numero}}</td>
             <td><a href="{{route('admin.proveedor.destroy',$proveedor->id)}}" onclick="return confirm('Desea eliminar a {{$proveedor->nombre}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                <a href="{{route('proveedor.edit',$proveedor->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href="#" class="btn btn-success" title="Comprar">Comprar</a></td>
             </tr>
          @endforeach
    
        </tbody>
      </table>
      </div>
      </div>
      <p></p>
    {!! $proveedores->render() !!}
@endsection