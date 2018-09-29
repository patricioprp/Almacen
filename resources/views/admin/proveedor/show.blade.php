@extends('admin.template.main')
@section('title','Listado de Compras a Proveedores')
@section('content')
@section('proveedor','active')
<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><p>Proveedor: <h2>{{$proveedor->nombre}}   </h2></p></h3>
       </div>   <a href="{{route('admin.compra.create',$proveedor->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Compra</span></a>
                               
        <div class="panel-body">
                <div class="col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                            <thead>
                              <th>FECHA</th>
                              <th>MONTO</th>
                              <th>EMPLEADO </th>
                              <th>ACCION</th>
                            </thead>
                            <tbxdy>
                        @foreach ($proveedor->compras as $compra)
                                 <tr>  
                                <td>{{\Carbon\Carbon::parse($compra->fecha)->format('d-m-Y')}}</td>
                                <td>${{$compra->monto}}</td>
                                <td>{{$compra->user->name}}</td>
                                <td>
                                  <a href="{{route('compra.edit',$compra->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                  <a href="{{route('admin.compra.destroy',$compra->id)}}" onclick="return confirm('Desea eliminar La Liquidacion?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <a href="{{route('admin.proveedor.view',$compra->id)}}" class="btn btn-success" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver Detalles</span></a>
                                </td>
                             </tr>
                              @endforeach
                        
                            </tbody>
                          </table>
                          </div>
                          </div>          
                      </div>
@endsection