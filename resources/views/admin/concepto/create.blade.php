@extends('admin.template.main')
@section('title','Creando Concepto')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => 'concepto.store','method'=>'POST']) !!}
<div class="from-group">
    <div class="row">
        <div class="col-lg-2">
            {!! Form::label('descripcion','DESCRIPCION',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder'=>'Descripcion','required']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::label('tipo','TIPO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('type',['' => 'Seleccione un Tipo', 'haberes'=>'Haberes','deducciones'=>'Deducciones'],null,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::label('importe','IMPORTE',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::text('importe',null,['class' => 'form-control', 'placeholder'=>'Importe','required']) !!}
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