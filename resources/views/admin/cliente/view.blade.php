@extends('admin.template.main')
@section('title','Detalles de Ventas en Cuenta Corriente')
@section('content')
@section('venta','active')
<h2>Cliente: <span class="label label-success">{{$ventas->cliente->nombre}}-{{$ventas->cliente->apellido}}</span></h2>
<h2>Estado: @if($state=="IMPAGO")
  <span class="label label-danger">{{$state}}</span>
  <a href="{{route('admin.pago.create',$ventas->id)}}" class="btn btn-primary">PAGAR</a>
  <a href="{{ route('ventaCC.pdf',['id'=>$ventas->id,'state'=>$state])}}" class="btn btn-sm btn-primary">
      <span class="glyphicon glyphicon-save" aria-hidden="true">    Factura (PDF)</span>
  </a>
@else
<span class="label label-primary">{{$state}}</span>
<a href="{{ route('ventaCC.pdf',['id'=>$ventas->id,'state'=>$state])}}" class="btn btn-sm btn-primary">
    <span class="glyphicon glyphicon-save" aria-hidden="true">    Factura (PDF)</span>
</a>
@endif</h2>
<h3>Vendedor: {{$ventas->user->name}}-{{$ventas->user->apellido}}</h3>
<div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
          <thead>
            <th>ID DETALLE</th>
            <th>ID PRODUCTO</th>
            <th>PRODUCTO</th>
            <th>SUBTOTAL</th>
            <th>PRECIO DE VENTA</th>
            <th>PRECIO DE COSTO</th>
            <th>CANTIDAD</th>
    
          </thead>
          <tbody>
              @foreach($ventas->lineaVentas as $l)
              <tr>
              <td>{{$l->id}}</td>
              <td>{{$l->producto->id}}</td>
              <td>{{$l->producto->descripcion}}</td>
              <td>{{$l->subTotal}}</td>
              <td>{{$l->producto->precio_venta}}</td>
              <td>{{$l->producto->precio_costo}}</td>
              <td>{{$l->cantidad}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <p><h3>Fecha: {{\Carbon\Carbon::parse($ventas->fecha)->format('d-m-Y')}}</h3><p> 
        <p><h3>Importe Total: ${{$ventas->monto}}</h3><p> 
    
        </div>
    @endsection
