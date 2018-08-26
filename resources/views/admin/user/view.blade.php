@extends('admin.template.main')
@section('title','Liquidacion de Sueldo')
@section('content')
@section('usuario','active')
<h2><span class="label label-success">{{$dliq->user->name}}-{{$dliq->user->apellido}}</span> Turno: <span class="label label-warning">{{$dliq->user->turno}}</span></h2>

<div class="table-responsive">
    <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
      <thead>
        <th>CONCEPTO</th>
        <th>HABERES</th>
        <th>DEDUCCIONES</th>
        <th>IMPORTE</th>
        <th>UNIDADES</th>

      </thead>
      <tbody>
          @foreach($dliq->detalleliquidacion as $l)
          <tr>
          <td>{{$l->concepto->descripcion}}</td>
          <td>{{$l->subTotalH}}</td>
          <td>{{$l->subTotalD}}</td>
          <td>{{$l->concepto->importe}}</td>
          <td>{{$l->unidad}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    </div>
@endsection