@extends('admin.template.main')
@section('title','Listado de Ventas en Cuenta Corriente')
@section('content')
@section('venta','active')
<div class="panel-heading"><h3><p>Clinete: <h2>{{$cliente->nombre}}{{$cliente->apellido}} </h2></p></h3></div>
<a href="{{route('admin.ventaCC.create',$cliente->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Venta</span></a>
<div class="panel-body">
    <div class="col-xs-12">
            <div class="table-responsive">
              <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                <thead>
                  <th>#</th>
                  <th>FECHA</th>
                  <th>MONTO</th>
                  <th>ACCION</th>
                </thead>
                <tbody>
            @foreach ($cliente->ventas as $lv)
                     <tr>  
                    <td>{{$lv->id}}</td>
                    <td>{{\Carbon\Carbon::parse($lv->fecha)->format('d-m-Y')}}</td>
                    <td>${{$lv->monto}}</td>
                    <td>
                      <a href="{{route('ventaCC.edit',$lv->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="{{route('admin.ventaCC.destroy',$lv->id)}}" onclick="return confirm('Desea eliminar La Liquidacion?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    <a href="{{route('admin.cliente.view',$lv->id)}}" class="btn btn-success" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver Detalles</span></a>
                    <a href="{{route('admin.ventaCC.viewCC',$cliente->cuenta_corriente->id)}}" class="btn btn-primary" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver Saldo CC</span></a>
                    </td>
                 </tr>
                  @endforeach
            
                </tbody>
              </table>
              </div>
              </div>          
          </div>
@endsection