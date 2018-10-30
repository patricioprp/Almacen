@extends('admin.template.main')
@section('title','Liquidacion de Haberes')
@section('content')
@section('usuario','active')
<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><p>Empleado: <h2>{{$user->name}}  {{$user->apellido}}  </h2></p></h3>
       </div>   <a href="{{ route('admin.liquidacion.create',$user->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Liquidacion</span></a>
       <a href="{{route('concepto.index')}}" class="btn btn-primary">Gestion de Concepto</a>                               
        <div class="panel-body">
                <div class="col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                            <thead>
                              <th>ID</th>
                              <th>SUELDO NETO</th>
                              <th>SUELDO BRUTO</th>
                              <th>PERIODO</th>
                              <th>ESTADO</th>
                              <th>DESDE</th>
                              <th>HASTA</th>
                              <th>ACCION</th>
                            </thead>
                            <tbxdy>
                        @foreach ($user->liquidacions as $liq)
                                 <tr>
                                 <td>{{$liq->id}}</td>   
                                <td>${{$liq->sueldoNeto}}</td>
                                <td>${{$liq->sueldoBruto}}</td>
                                <td>{{$liq->periodo}}</td>
                                <td>
                                  @if ($liq->estado=="pendiente")
                                    <h4><span class="label label-warning">{{$liq->estado}}</h4></span>
                                  @else
                                  <h4><span class="label label-success">{{$liq->estado}}</h4></span>
                                  @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($liq->desde)->format('d-m-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($liq->hasta)->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('liquidacion.edit',$liq->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <a href="{{route('admin.liquidacion.destroy',$liq->id)}}" onclick="return confirm('Desea eliminar La Liquidacion?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                  <a href="{{route('admin.user.view',$liq->id)}}" class="btn btn-success" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver Conceptos</span></a>
                                  <a href="{{route('admin.familia.index',$user->id)}}" class="btn btn-primary" title="Ver"><span class="glyphicon glyphicon-share" aria-hidden="true"> Grupo familiar</span></a>
                                </td>
                             </tr>
                              @endforeach
                        
                            </tbody>
                          </table>
                          </div>
                          </div>          
                      </div>
        
@endsection