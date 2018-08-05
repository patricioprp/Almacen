@extends('admin.template.main')
@section('title','Liquidacion de Haberes')
@section('content')
@section('usuario','active')
<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><p>Empleado: <h2>{{$user->name}}  {{$user->apellido}}  </h2></p></h3></div>
        <div class="panel-body">
                <div class="col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                            <thead>
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
                                <td>${{$liq->sueldoNeto}}</td>
                                <td>${{$liq->sueldoBruto}}</td>
                                <td>{{$liq->periodo}}</td>
                                <td>{{$liq->estado}}</td>
                                <td>{{\Carbon\Carbon::parse($liq->desde)->format('d-m-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($liq->hasta)->format('d-m-Y')}}</td>
                                <td><a href="{{route('admin.user.view',$liq->id)}}" class="btn btn-success" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>
                             </tr>
                              @endforeach
                        
                            </tbody>
                          </table>
                          </div>
                          </div>          
                      </div>
        
@endsection