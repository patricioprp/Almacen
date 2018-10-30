@extends('admin.template.main')
@section('title','Editando Integrante')
@section('content')
@section('usuario','active')
<h2>Editar Grupo Familiar de  {{$familia->user->name}} {{$familia->user->apellido}}</h2>
{!! Form::open(['route' => ['familia.update',$familia],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-lg-2">
            {!! Form::text('familia_id',$familia->id,['class' => 'form-control hidden', 'required']) !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h5>{!! Form::label('nombre','Nombre',['class'=>'control-label']) !!} </h5>  
      </div>
      <div class="col-lg-2">
        <h5> {!! Form::text('nombre',$familia->nombre,['class' => 'form-control', 'placeholder'=>'nombre','required']) !!}</h5>
      </div>
      <div class="col-lg-2">
        <h5>{!! Form::label('apellido','Apellido',['class'=>'control-label']) !!} </h5>  
      </div>
      <div class="col-lg-2">
        <h5> {!! Form::text('apellido',$familia->apellido,['class' => 'form-control', 'placeholder'=>'apellido','required']) !!}</h5>
      </div>
    <div class="col-lg-2">
            <h5>{!! Form::label('f_nac','Fecha de Nacimiento',['class'=>'control-label']) !!} </h5>  
          </div>
          <div class="col-lg-2">
            <h5> {!! Form::text('f_nac',\Carbon\Carbon::parse($familia->f_nac)->format('d-m-Y'),['class' => 'form-control fecha', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h5>
          </div>
</div>
<div class="row">
          <div class="col-lg-2">
                <h5>{!! Form::label('dni','DNI',['class'=>'control-label']) !!} </h5>  
              </div>
              <div class="col-lg-2">
                <h5> {!! Form::text('dni',$familia->dni,['class' => 'form-control', 'placeholder'=>'DNI','required']) !!}</h5>
              </div>
              <div class="col-lg-2">
                {!! Form::label('type','TIPO DE RELACION',['class'=>'control-label']) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::select('type',['' => 'Seleccione un Tipo', 'hijo'=>'HIJO','conyugue'=>'CONYUGUE','persona_cargo'=>'PERSONA A CARGO'],$familia->type,['class'=>'form-control']) !!}
            </div>
        </div>
<div class="form-group">
    {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
  </div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
$( function() {
$( ".fecha" ).datepicker();
} );
</script>
@endsection