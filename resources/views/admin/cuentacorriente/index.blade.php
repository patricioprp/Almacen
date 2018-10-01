@extends('admin.template.main')
@section('title','Estado de Cuenta Corriente')
@section('content')
@section('venta','active')
<h3>Cliente: {{$cc->cliente->nombre}}-{{$cc->cliente->apellido}}</h3>
<div class="row">
        <div class="col-lg-2">
                <h2>Estado:{{$cc->estado}}</h2>
                </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <h2>Monto de la Deuda: ${{$cc->monto}}</h2>
    </div>
</div>
@endsection