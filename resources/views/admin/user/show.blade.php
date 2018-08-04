@extends('admin.template.main')
@section('title','Liquidacion de Haberes')
@section('content')
@section('usuario','active')
<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3><p>Empleado: <h2>{{$user->name}}  {{$user->apellido}}  |  Periodo:{{$user->liquidacion->periodo}} | Sueldo Neto: {{$user->liquidacion->sueldoNeto}} </h2></p></h3></div>
        <div class="panel-body">
          <h3><p>Desde: {{\Carbon\Carbon::parse($user->liquidacion->desde)->format('d-m-Y')}}</p></h3>
          <h3><p><p>Hasta: {{\Carbon\Carbon::parse($user->liquidacion->hasta)->format('d-m-Y')}}</p></p></h3>
        </div>
        
@endsection