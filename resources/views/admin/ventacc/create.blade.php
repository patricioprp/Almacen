@extends('admin.template.main')
@section('title','Creando Venta CC')
@section('content')
@section('venta','active')
<h3>Cliente: {{$cliente->nombre}}-{{$cliente->apellido}}</h3>
{!! Form::open(['route' => 'ventaCC.store','method'=>'POST']) !!}
<div class="form-group">
    <div class="row">
        <div class="col-lg-2">
                {!! Form::text('idc',$cliente->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('fecha','Fecha',['class'=>'control-label']) !!} </h3>  
              </div>
              <div class="col-lg-2">
                <h3> {!! Form::text('fecha',null,['class' => 'form-control venta', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h3>
              </div>
            </div>
            <hr />
            <div class="row">
                    <div id="dynamicDiv"> 
                     <div class="row">
                        <div class="col-lg-2">
                           {!! Form::label('productos','Productos',['class'=>'control-label','id'=>'Productos']) !!}   
                            </div>
                         <div class="col-lg-2">
                            {!! Form::select('productos[]', $productos,null,['class' => 'form-control select-productos','id'=>'productos', 'multiple', 'required']) !!}
                          </div>
                           <div class="col-lg-2">
                            {!! Form::label('cantidad','Cantidad',['class'=>'control-label','id'=>'Cantidad']) !!}   
                             </div>
                               <div class="col-lg-2">
                                 {!! Form::text('cantidad[]',null,['class' => 'form-control','id'=>'Cantidad', 'placeholder'=>'Cantidad','required']) !!}
                                 </div>
                                 <div class="col-lg-2">
                                    <a class="btn btn-primary" href="" id="addInput">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar Producto</span>
                                     </a> 
                                 </div>
                                 <hr />
                    </div>
                            </div>                       
                            </div>
                            <div class="row">
                                    <div class="col-lg-2">
                                            {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
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