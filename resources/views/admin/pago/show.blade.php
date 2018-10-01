@extends('admin.template.main')
@section('title','Listado Pago en Cuenta Corriente')
@section('content')
@section('venta','active')
 <a href="{{route('admin.pago.create',$cliente->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Pago</span></a>
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
                @foreach ($cliente->pagocc as $p)
                         <tr>
                        <td>{{$p->id}}</td>
                        <td>{{\Carbon\Carbon::parse($p->fecha)->format('d-m-Y')}}</td>
                        <td>${{$p->monto}}</td>
                        <td>
                          <a href="{{route('pago.edit',$p->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                          <a href="{{route('admin.pago.destroy',$p->id)}}" onclick="return confirm('Desea eliminar La Liquidacion?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                     </tr>
                      @endforeach
                
                    </tbody>
                  </table>
                  </div>
                  </div>          
              </div>
 @endsection