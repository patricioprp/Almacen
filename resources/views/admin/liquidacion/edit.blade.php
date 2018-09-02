@extends('admin.template.main')
@section('title','Editando Liquidacion')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => ['liquidacion.update',$liquidacion],'method'=>'PUT']) !!}
<div class="form-group">
    <div class="row">
        <div class="col-lg-2">
            <h3>{!! Form::label('empleado','Empleado:',['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('user',$liquidacion->user->name,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                {!! Form::text('id',$liquidacion->user->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('apellido',$liquidacion->user->apellido,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('dni',$liquidacion->user->dni,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::label('periodo','Periodo',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::select('periodo',['' => 'Seleccione un Periodo', 'Enero'=>'Enero','Febrero'=>'Febrero','Marzo'=>'Marzo','Abril'=>'Abril',
                'Mayo'=>'Mayo','Junio'=>'Junio','Julio'=>'Julio','Agosto'=>'Agosto','Septiembre'=>'Septiembre','Octubre'=>'Octubre',
                'Noviembre'=>'Noviembre','Diciembre'=>'Diciembre'],$liquidacion->periodo,['class'=>'form-control select-periodo']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('estado','Estado',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::select('estado',['' => 'Seleccione un Estado', 'liquidado'=>'liquidado','pendiente'=>'pendiente'],$liquidacion->estado,['class'=>'form-control select-estado']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::label('desde','Desde',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('desde',\Carbon\Carbon::parse($liquidacion->desde)->format('d-m-Y'),['class' => 'form-control', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('hasta','Hasta',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('hasta',\Carbon\Carbon::parse($liquidacion->hasta)->format('d-m-Y'),['class' => 'form-control', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
            @foreach ($liquidacion->detalleliquidacions as $l)
            <div id="dynamicDiv">
                <div class="row">
                    
                    <div class="col-lg-2">
                            {!! Form::label('conceptos','Conceptos',['class'=>'control-label','id'=>'Conceptos']) !!}
                    </div>
                    <div class="col-lg-2">
                            {!! Form::select('conceptos[]', $conceptos,$l->concepto->id,['class' => 'form-control select-conceptos','id'=>'conceptos', 'multiple', 'required']) !!}
                    </div>
                    <div class="col-lg-2">
                            {!! Form::label('unidades','Unidades',['class'=>'control-label','id'=>'Unidades']) !!}
                    </div>
                    <div class="col-lg-2">
                            {!! Form::text('unidades[]',$l->unidad,['class' => 'form-control','id'=>'unidades', 'placeholder'=>'Unidades','required']) !!}
                    </div>
                    <div class="col-lg-2">
                            <a class="btn btn-danger" href="" id="remInput"><span class="glyphicon glyphicon-minus" aria-hidden="true">Eliminar Concepto</span>
                                    </a>
                    </div>
                    <div class="col-lg-2">
                            <a class="btn btn-primary" href="" id="addInput">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar Concepto</span>
                             </a> 
                         </div>
                    
                </div>
            </div>
            @endforeach
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
  +'{!! Form::label('conceptos','Conceptos',['class'=>'control-label','id'=>'Conceptos']) !!}'   
  +'</div>'
  +'<div class="col-lg-2">'
  +'{!! Form::select('conceptos[]', $conceptos,null,['class' => 'form-control select-conceptos','id'=>'conceptos', 'multiple', 'required']) !!}'
  +'</div>'
  +'<div class="col-lg-2">'
  +'{!! Form::label('unidades','Unidades',['class'=>'control-label','id'=>'Unidades']) !!}' 
  +'</div>'
  +'<div class="col-lg-2">'
  +'{!! Form::text('unidades[]',null,['class' => 'form-control','id'=>'unidades', 'placeholder'=>'Unidades','required']) !!}'
  +'</div>'
  +'<div class="col-lg-2">'
  +'<a class="btn btn-danger" href="" id="remInput">'
  +'<span class="glyphicon glyphicon-minus" aria-hidden="true">Eliminar Concepto</span>'
  +'</a>'
  +'</div>'
  +'</p>'
  +'</div>'
  ).appendTo(cntDiv);
  $('.select-conceptos').chosen({
disable_search_threshold: 1,
placeholder_text_multiple: "Seleccione un Concepto como Maximo",
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
$('.select-conceptos').chosen({
disable_search_threshold: 1,
placeholder_text_multiple: "Seleccione un Concepto como Maximo",
max_selected_options: 1,
   });
  $('.select-periodo').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN PERIODO"
   });
</script>
<script>
  $('.select-estado').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN ESTADO"
    });
</script>
@endsection
