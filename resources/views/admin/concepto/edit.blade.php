@extends('admin.template.main')
@section('title','Editando Concepto')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => ['concepto.update',$concepto],'method'=>'PUT']) !!}
<div class="form-group">
    <div class="row">
        <div class="col-lg-2">
                {!! Form::label('descripcion','DESCRIPCION',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('deescripcion',$concepto->descripcion,['class' => 'form-control', 'placeholder'=>'Descripcion','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('tipo','TIPO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::select('tipo',['' => 'Seleccione un Tipo', 'haberes'=>'Haberes','deducciones'=>'Deducciones'],$concepto->tipo,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('importe','IMPORTE',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('importe',$concepto->importe,['class' => 'form-control', 'placeholder'=>'Importe','required'])!!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection