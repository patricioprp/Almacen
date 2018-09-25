@extends('admin.template.main')
@section('title','Listado de Compras a Proveedores')
@section('content')
@section('proveedor','active')
<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><p>Proveedor: <h2>{{$proveedor->nombre}}   </h2></p></h3>
       </div>   <a href="{{route('admin.compra.create',$proveedor->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Liquidacion</span></a>
                               
        <div class="panel-body">
                <div class="col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                            <thead>
                              <th>FECHA</th>
                              <th>MONTO</th>
                              <th>EMPLEADO </th>
                            </thead>
                            <tbxdy>
                        @foreach ($proveedor->compras as $compra)
                                 <tr>  
                                <td>{{\Carbon\Carbon::parse($compra->fecha)->format('d-m-Y')}}</td>
                                <td>${{$compra->monto}}</td>
                                <td>{{$compra->user->name}}</td>
 
                             </tr>
                              @endforeach
                        
                            </tbody>
                          </table>
                          </div>
                          </div>          
                      </div>
@endsection