@extends('admin.template.main')
@section('title','Editando Compra')
@section('content')
@section('proveedor','active')
{!! Form::open(['route' => ['compra.update',$compra],'method'=>'PUT']) !!}
<div class="form-group">
        <div class="row">
                <div class="col-lg-2">
                    <h3>{!! Form::label('proveedor','Proveedor:',['class'=>'col-lg-1 control-label']) !!}</h3>
                </div>
                <div class="col-lg-2">
                    <h3>{!! Form::label('proveedor',$compra->proveedor->nombre,['class'=>'col-lg-1 control-label']) !!}</h3>
                </div>
                <div class="col-lg-2">
                    {!! Form::text('id',$compra->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
                </div>
                <div class="col-lg-2">
                                {!! Form::text('idp',$compra->proveedor->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
                            </div>
                <div class="col-lg-2">
                        <h3>{!! Form::label('fecha','Fecha',['class'=>'control-label']) !!} </h3>  
                      </div>
                      <div class="col-lg-2">
                        <h3> {!! Form::text('fecha',\Carbon\Carbon::parse($compra->fecha)->format('d-m-Y'),['class' => 'form-control compra', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h3>
                      </div>
            </div>
<hr />
<div class="row">
        @foreach ($compra->lineaCompra as $l)
        <div id="dynamicDiv">
                <div class="row">
                        <div class="col-lg-2">
                           {!! Form::label('productos','Productos',['class'=>'control-label','id'=>'Productos']) !!}   
                        </div>
                        <div class="col-lg-2">
                            {!! Form::select('productos[]', $producto,$l->producto->id,['class' => 'form-control select-productos','id'=>'productos', 'multiple', 'required']) !!}
                        </div>
                        <div class="col-lg-2">
                                {!! Form::label('cantidad','Cantidad',['class'=>'control-label','id'=>'Cantidad']) !!}   
                        </div>
                        <div class="col-lg-2">
                                {!! Form::text('cantidad[]',$l->cantidad,['class' => 'form-control','id'=>'Cantidad', 'placeholder'=>'Cantidad','required']) !!}
                        </div>

                        <div class="col-lg-2">
                                <a class="btn btn-danger" href="" id="remInput"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                        </div>
                        <div class="col-lg-2">
                                <a class="btn btn-primary" href="" id="addInput">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a> 
                        </div>
                        <hr />
                    </div>
            </div>
        </div>
        @endforeach
</div>
<hr />
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
         +'{!! Form::select('productos[]', $producto,null,['class' => 'form-control select-productos','id'=>'productos', 'multiple', 'required']) !!}'
         +'</div>'
         +'<div class="col-lg-2">'
         +'{!! Form::label('cantidad','Cantidad',['class'=>'control-label','id'=>'Cantidad']) !!}' 
         +'</div>'
         +'<div class="col-lg-2">'
         +'{!! Form::text('cantidad[]',null,['class' => 'form-control','id'=>'cantidad', 'placeholder'=>'Cantidad','required']) !!}'
         +'</div>'
         +'<div class="col-lg-2">'
         +'<a class="btn btn-danger" href="" id="remInput">'
         +'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'
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
          $('.select-tipos').chosen({
       disable_search_threshold: 1,
       placeholder_text_multiple: "Seleccione un Tipo como Maximo",
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
          $('.select-tipos').chosen({
        no_results_text: "No se encontro ninguna coincidencia con:",
        max_selected_options: 1,
        placeholder_text_multiple: "Seleccione un Tipo"
           });
        </script>
<script>
$( function() {
$( ".compra" ).datepicker();
} );
</script>
@endsection