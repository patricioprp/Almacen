@extends('admin.template.main')
@section('title','Editando Producto')
@section('content')
<h2>Editar Producto:  {{$producto->descripcion}}</h2>
@section('producto','active')
{!! Form::open(['route' => ['producto.update',$producto],'method'=>'PUT']) !!}
<div class="form-group">
        <div class="row">
                <div class="col-lg-2">
                  {!! Form::label('descripcion','DESCRIPCION',['class'=>'control-label']) !!}
                </div>
                  <div class="col-lg-2">
                   {!! Form::text('descripcion',$producto->descripcion,['class' => 'form-control', 'placeholder'=>'Descripcion','required']) !!}
                  </div>
                  <div class="col-lg-2">
                   {!! Form::label('precio_costo','PRECIO DE COSTO',['class'=>'control-label']) !!}
                  </div>
                  <div class="col-lg-2">
                   {!! Form::text('precio_costo',$producto->precio_costo,['class' => 'form-control', 'placeholder'=>'Precio de Costo','required']) !!}
                  </div>   
                  <div class="col-lg-2">
                   {!! Form::label('precio_venta','PRECIO DE VENTA',['class'=>'control-label']) !!}
                  </div>
                  <div class="col-lg-2">
                   {!! Form::text('precio_venta',$producto->precio_venta,['class' => 'form-control', 'placeholder'=>'PRECIO DE VENTA','required']) !!}
                  </div> 
             </div>
<hr />
<div class="row">
        <div class="col-lg-2">
          {!! Form::label('cantidad','Cantidad Habitual',['class'=>'control-label']) !!}
        </div>
          <div class="col-lg-2">
           {!! Form::text('cantidad',$producto->stock->cantidad,['class' => 'form-control', 'placeholder'=>'Cantidad Habitual','required']) !!}
          </div>
          <div class="col-lg-2">
           {!! Form::label('minimo','Cantidad Minima',['class'=>'control-label']) !!}
          </div>
          <div class="col-lg-2">
           {!! Form::text('minimo',$producto->stock->minimo,['class' => 'form-control', 'placeholder'=>'Cantidad Minims','required']) !!}
          </div>   
          <div class="col-lg-2">
           {!! Form::label('tipo','Tipo de Articulo',['class'=>'control-label']) !!}
          </div>
          <div class="col-lg-2">
                {!! Form::select('tipos', $tipos,$producto->tipo->id,['class' => 'form-control select-tipos','id'=>'tipos', 'multiple', 'required']) !!}
          </div> 
     </div>
     <hr />
</div>
<div class="row">
        <div class="col-lg-2">
                {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
$('.select-tipos').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "Seleccione un Tipo"
   });
</script>
@endsection