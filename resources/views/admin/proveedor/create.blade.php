@extends('admin.template.main')
@section('title','Creando Proveedor')
@section('content')
@section('proveedor','active')
{!! Form::open(['route' => 'proveedor.store','method'=>'POST']) !!}
<div class="form-group">
        <div class="row">
           <div class="col-lg-2">
             {!! Form::label('nombre','NOMBRE',['class'=>'control-label']) !!}
           </div>
             <div class="col-lg-2">
              {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
             </div>
             <div class="col-lg-2">
                    {!! Form::label('telefono','TELEFONO',['class'=>'control-label']) !!}
                 </div>
                    <div class="col-lg-2">
                       {!! Form::text('telefono',null,['class' => 'form-control', 'placeholder'=>'Telefono','required']) !!}
                    </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-2">
                {!! Form::select('state',$states,null,['class'=>'form-control','id' =>'state','placeholder'=>'Seleccione un Pais'])!!}
            </div>
            <div class="col-lg-2">
                {!! Form::select('province',['placeholder'=>'Seleccion una Provincia'],null,['class'=>'form-control select-provincia','id'=>'province'])!!}
            </div>
            <div class="col-lg-2">
                {!! Form::select('location',['placeholder'=>'Selecciona una Localidad'],null,['class'=>'form-control','id'=>'location'])!!}
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-2">
                    {!! Form::label('calle','CALLE',['class'=>'control-label']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::text('calle',null,['class' => 'form-control', 'placeholder'=>'CALLE','required']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::label('numero','NUMERO',['class'=>'control-label']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::text('numero',null,['class' => 'form-control', 'placeholder'=>'NUMERO','required']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::label('barrio','BARRIO',['class'=>'control-label']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::text('barrio',null,['class' => 'form-control', 'placeholder'=>'BARRIO','required']) !!}
            </div>
        </div>
        <hr /><hr />
        <div class="row">
            <div class="col-lg-2">
                    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection