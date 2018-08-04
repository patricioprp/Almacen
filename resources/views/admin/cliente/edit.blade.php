@extends('admin.template.main')
@section('title','Editando Cliente')
@section('content')
<h2>Editar Cliente {{$cliente->nombre}} {{$cliente->apellido}}</h2>
@section('cliente','active')
{!! Form::open(['route' => ['cliente.update',$cliente],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-lg-2">
            {!! Form::label('nombre','NOMBRE',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('nombre',$cliente->nombre,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
            {!! Form::text('domicilio',$cliente->domicilio_id,['class' => 'form-control hidden', 'placeholder'=>'Nombre','required']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::label('apellido','APELLIDO',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('apellido',$cliente->apellido,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::label('dni','DNI',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('dni',$cliente->dni,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
    </div>
</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('telefono','TELEFONO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('telefono',$cliente->telefono,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
</div>
</div>
<hr />
<div class="row">

        <div class="col-lg-2">
                {!! Form::select('state',$states,$cliente->domicilio->location->province->state->id,['class' => 'form-control','id'=>'state']) !!}    
        </div>
        <div class="col-lg-2">
                {!! Form::select('province',$provinces,$cliente->domicilio->location->province->id,['class' => 'form-control','id'=>'province']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::select('location',$locations,$cliente->domicilio->location->id,['class' => 'form-control','id'=>'location']) !!}
            </div>
</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('calle','CALLE',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('calle',$cliente->domicilio->calle,['class' => 'form-control', 'placeholder'=>'Calle','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('numero','NUMERO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('numero',$cliente->domicilio->numero,['class' => 'form-control', 'placeholder'=>'numero','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('barrio','BARRIO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('barrio',$cliente->domicilio->barrio,['class' => 'form-control', 'placeholder'=>'barrio','required']) !!}
        </div>
</div>
<div class="form-group">
                {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
              </div>
{!! Form::close() !!}
@endsection