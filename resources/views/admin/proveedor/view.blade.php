@extends('admin.template.main')
@section('title','Detalles de Compra')
@section('content')
@section('proveedor','active')
<h2><span class="label label-success">{{$compra->proveedor->nombre}}</span></h2>

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
          @foreach($compra->lineaCompra as $l)
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
    <p><h3>Importe Total: ${{$compra->monto}}</h3><p> 
    </div>
    <p>
        <a href="{{ route('compra.pdf',$compra->id)}}" class="btn btn-sm btn-primary">
            <span class="glyphicon glyphicon-save" aria-hidden="true">     Factura (PDF)</span>
        </a>
    </p>
@endsection