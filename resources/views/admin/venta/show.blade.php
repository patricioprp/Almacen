@extends('admin.template.main')
@section('title','Listado de Ventas al Contado')
@section('content')
@section('venta','active')
<div class="panel panel-default">
        <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                    <thead>
                      <th>DESCRIPCION</th>
                      <th>TIPO</th>
                      <th>PRECIO</th>
                      <th>CANTIDAD</th>
                      <th>SUBTOTAL</th>
                    </thead>
                    <tbody>
                @foreach ($venta->lineaVentas as $lv)
                         <tr>  
                        <td>{{$lv->producto->descripcion}}</td>
                        <td>{{$lv->producto->tipo->descripcion}}</td>
                        <td>${{$lv->producto->precio_venta}}</td>
                         <td>{{$lv->cantidad}}</td>
                         <td>${{$lv->subTotal}}</td>
                     </tr>
                      @endforeach
                
                    </tbody>
                  </table>
                <h3>IMPORTE TOTAL: ${{$venta->monto}}</h3>
                  </div>
                  </div>   
</div>
@endsection