@extends('admin.template.main')
@section('title','Liquidacion de Sueldo')
@section('content')
@section('usuario','active')
<h2><span class="label label-success">{{$dliq->user->name}}-{{$dliq->user->apellido}}</span> Turno: <span class="label label-warning">{{$dliq->user->turno}}</span></h2>
<p><b>Fecha de ingreso: {{\Carbon\Carbon::parse($dliq->user->create_at)->format('d-m-Y')}}</b></p>
<div class="table-responsive">
    <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
      <thead>
        <th>ID DLiq</th>
        <th>ID Concepto</th>
        <th>CONCEPTO</th>
        <th>HABERES</th>
        <th>DEDUCCIONES</th>
        <th>IMPORTE</th>
        <th>UNIDADES</th>

      </thead>
      <tbody>
          @foreach($dliq->detalleliquidacions as $l)
          <tr>
          <td>{{$l->id}}</td>
          <td>{{$l->concepto->id}}</td>
          <td>{{$l->concepto->descripcion}}</td>
          <td>{{$l->subTotalH}}</td>
          <td>{{$l->subTotalD}}</td>
          <td>{{$l->concepto->importe}}</td>
          <td>{{$l->unidad}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <p><h3>Total Sueldo Neto: ${{$dliq->sueldoNeto}}</h3><p> 
    <h3>Total Sueldo Bruto: ${{$dliq->sueldoBruto}}</h3>
    </div>
    <p>
        <a href="{{ route('liquidaciones.pdf',$dliq->id)}}" class="btn btn-sm btn-primary">
            Descargar Liquidacion en PDF
        </a>
    </p>
@endsection