@extends('admin.template.main')
@section('title','Liquidacion de Sueldo')
@section('content')
@section('usuario','active')
<h2><span class="label label-success">{{$dliq->liquidacion->user->name}}-{{$dliq->liquidacion->user->apellido}}</span> Turno: <span class="label label-warning">{{$dliq->liquidacion->user->turno}}</span></h2>
<p>{{$dliq->concepto->descripcion}}</p>
@endsection