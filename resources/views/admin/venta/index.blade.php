@extends('admin.template.main')
@section('title','Listado de  Ventas al Contado')
@section('content')
@section('venta','active')
<h3><b>Modulo de Gestion de Ventas al Contado</b></h3>
<a href="{{ asset('admin/ventaContado/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Venta</span></a>
<div class="col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
            <thead>
              <th>#</th>
              <th>MONTO</th>
              <th>FECHA</th>
              <th>VENDEDOR</th>
              <th>ACCION</th>
            </thead>
            <tbody>
              @foreach ($ventas as $venta)
                 <tr>
                   <td>{{$venta->id}}</td>
                   <td>{{$venta->monto}}</td>
                   <td>{{\Carbon\Carbon::parse($venta->fecha)->format('d-m-Y')}}</td>
                   <td>{{$venta->user->name}}-{{$venta->user->apellido}}</td>
                 <td><a href="{{route('admin.ventaContado.destroy',$venta->id)}}" onclick="return confirm('Desea eliminar a {{$venta->user->name}}{{$venta->user->apellido}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    <a href="{{route('ventaContado.edit',$venta->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="{{route('admin.ventaContado.show',$venta->id)}}" class="btn btn-success" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver Detalles</span></a></td>
                  </td>
                 </tr>
              @endforeach
        
            </tbody>
          </table>
          </div>
          </div>
          <p></p>
          {!! $ventas->render() !!}
@endsection