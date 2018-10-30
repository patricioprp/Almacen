@extends('admin.template.main')
@section('title','Listado de  Productos')
@section('content')
@section('producto','active')
<h3><b>Modulo de Gestion de Producto</b></h3>
<a href="{{ asset('admin/producto/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
   {{-- Buscador de empleado --}}
   {!! Form::open(['route' => 'producto.index', 'method' => 'GET', 'autocomplete' => 'off',
   'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
   <div class="input-group">
       {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

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
      <th>DESCRIPCION</th>
      <th>PRECIO DE COSTO</th>
      <th>PRECIO DE VENTA</th>
      <th>STOCK ACTUAL</th>
      <th>STOCK MINIMO</th>
      <th>TIPO DE ARTICULO</th>
      <th>ACCION</th>
    </thead>
    <tbody>
      @foreach ($productos as $prod)
         <tr>
           <td>{{$prod->id}}</td>
           <td>{{$prod->descripcion}}</td>
           <td>${{$prod->precio_costo}}</td>
           <td>${{$prod->precio_venta}}</td>
           <td>{{$prod->stock->cantidad}}</td>
           <td>{{$prod->stock->minimo}}</td>
           <td>{{$prod->tipo->descripcion}}</td>
         <td><a href="{{route('admin.producto.destroy',$prod->id)}}" onclick="return confirm('Desea eliminar a {{$prod->descripcion}}{{$prod->tipo->descripcion}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="{{route('producto.edit',$prod->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
         </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
  <p>
    <a href="{{ route('productos.pdf')}}" class="btn btn-sm btn-primary">
        <span class="glyphicon glyphicon-save" aria-hidden="true">     RECIBO (PDF)</span>
    </a>
</p>
{!! $productos->render() !!}
@endsection