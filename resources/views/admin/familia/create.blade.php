@extends('admin.template.main')
@section('title','Creando Integrante')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => 'familia.store','method'=>'POST']) !!}
<div class="row">
        <div class="col-lg-2">
                {!! Form::text('user_id',$user->id,['class' => 'form-control hidden', 'required']) !!}
        </div>
    </div>
<div class="row">
        <div class="col-lg-2">
            <h5>{!! Form::label('nombre','Nombre',['class'=>'control-label']) !!} </h5>  
          </div>
          <div class="col-lg-2">
            <h5> {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'nombre','required']) !!}</h5>
          </div>
          <div class="col-lg-2">
            <h5>{!! Form::label('apellido','Apellido',['class'=>'control-label']) !!} </h5>  
          </div>
          <div class="col-lg-2">
            <h5> {!! Form::text('apellido',null,['class' => 'form-control', 'placeholder'=>'apellido','required']) !!}</h5>
          </div>
        <div class="col-lg-2">
                <h5>{!! Form::label('f_nac','Fecha de Nacimiento',['class'=>'control-label']) !!} </h5>  
              </div>
              <div class="col-lg-2">
                <h5> {!! Form::text('f_nac',null,['class' => 'form-control fecha', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h5>
              </div>
</div>
<div class="row">
              <div class="col-lg-2">
                    <h5>{!! Form::label('dni','DNI',['class'=>'control-label']) !!} </h5>  
                  </div>
                  <div class="col-lg-2">
                    <h5> {!! Form::text('dni',null,['class' => 'form-control', 'placeholder'=>'DNI','required']) !!}</h5>
                  </div>
                  <div class="col-lg-2">
                    {!! Form::label('type','TIPO DE RELACION',['class'=>'control-label']) !!}
                </div>
                <div class="col-lg-2">
                    {!! Form::select('type',['' => 'Seleccione un Tipo', 'hijo'=>'HIJO','conyugue'=>'CONYUGUE','persona_cargo'=>'PERSONA A CARGO'],null,['class'=>'form-control']) !!}
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
$( function() {
$( ".fecha" ).datepicker();
} );
</script>
@endsection