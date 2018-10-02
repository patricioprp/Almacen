@extends('admin.template.main')
@section('title','Editando Venta al CC')
@section('content')
<h2>Editar Venta de {{$venta->cliente->nombre}} {{$venta->cliente->apellido}}</h2>
@section('venta','active')
{!! Form::open(['route' => ['ventaContado.update',$venta],'method'=>'PUT']) !!}
<div class="form-group">
<div class="row">
        <div class="col-lg-2">
                <h3>{!! Form::label('fecha','Fecha',['class'=>'control-label']) !!} </h3>  
              </div>
              <div class="col-lg-2">
                <h3> {!! Form::text('fecha',\Carbon\Carbon::parse($venta->fecha)->format('d-m-Y'),['class' => 'form-control venta', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h3>
              </div>
</div>
<hr />
<div class="row">
        @foreach ($venta->lineaVentas as $l)
        <div id="dynamicDiv"> 
         <div class="row">
            <div class="col-lg-2">
               {!! Form::label('productos','Productos',['class'=>'control-label','id'=>'Productos']) !!}   
                </div>
             <div class="col-lg-2">
                {!! Form::select('productos[]', $productos,$l->producto->id,['class' => 'form-control select-productos','id'=>'productos', 'multiple', 'required']) !!}
              </div>
               <div class="col-lg-2">
                {!! Form::label('cantidad','Cantidad',['class'=>'control-label','id'=>'Cantidad']) !!}   
                 </div>
                   <div class="col-lg-2">
                     {!! Form::text('cantidad[]',$l->cantidad,['class' => 'form-control','id'=>'Cantidad', 'placeholder'=>'Cantidad','required']) !!}
                     </div>
                     <hr />
        </div>
                </div> 
                @endforeach                      
                </div>
<div class="row">
        <div class="col-lg-4">
                {!! Form::submit('Registrar',['class'=>'btn btn-warning']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
        $(function (){
         var cntDiv = $('#dynamicDiv');
         $(document).on('click','#addInput',function(){
         $('<div class="row">'
         +'<p>'
         +'<hr />'
         +'<div class="col-lg-2">'
         +'{!! Form::label('productos','Productos',['class'=>'control-label','id'=>'Productos']) !!}'   
         +'</div>'
         +'<div class="col-lg-2">'
         +'{!! Form::select('productos[]', $productos,null,['class' => 'form-control select-productos','id'=>'productos', 'multiple', 'required']) !!}'
         +'</div>'
         +'<div class="col-lg-2">'
         +'{!! Form::label('cantidad','Cantidad',['class'=>'control-label','id'=>'Cantidad']) !!}' 
         +'</div>'
         +'<div class="col-lg-2">'
         +'{!! Form::text('cantidad[]',null,['class' => 'form-control','id'=>'cantidad', 'placeholder'=>'Cantidad','required']) !!}'
         +'</div>'
         +'<div class="col-lg-2">'
         +'<a class="btn btn-danger" href="" id="remInput">'
         +'<span class="glyphicon glyphicon-minus" aria-hidden="true">Eliminar Producto</span>'
         +'</a>'
         +'</div>'
         +'</p>'
         +'</div>'
         ).appendTo(cntDiv);
         $('.select-productos').chosen({
       disable_search_threshold: 1,
       placeholder_text_multiple: "Seleccione un Producto como Maximo",
       max_selected_options: 1,
          });
          return false;
         });
          $(document).on('click','#remInput', function(){
          $(this).closest('.row').remove();
           return false;
          });
       });
       </script>
<script>
$('.select-productos').chosen({
disable_search_threshold: 1,
placeholder_text_multiple: "Seleccione un Producto como Maximo",
max_selected_options: 1,
   });
</script>
<script>
$( function() {
$( ".venta" ).datepicker();
} );
</script>
@endsection