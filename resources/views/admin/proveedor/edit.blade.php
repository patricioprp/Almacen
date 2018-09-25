@extends('admin.template.main')
@section('title','Editando Proveedor')
@section('content')
<h2>Editar Proveedor {{$proveedor->nombre}}</h2>
@section('proveedor','active')
{!! Form::open(['route' => ['proveedor.update',$proveedor],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-lg-2">
            {!! Form::label('nombre','NOMBRE',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('nombre',$proveedor->nombre,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
            {!! Form::text('domicilio',$proveedor->domicilio_id,['class' => 'form-control hidden', 'placeholder'=>'Nombre','required']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::label('telefono','TELEFONO',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('telefono',$proveedor->telefono,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
    </div>
</div>
<hr />
<div class="row">

        <div class="col-lg-2">
                {!! Form::select('state',$states,$proveedor->domicilio->location->province->state->id,['class' => 'form-control','id'=>'state']) !!}    
        </div>
        <div class="col-lg-2">
                {!! Form::select('province',$provinces,$proveedor->domicilio->location->province->id,['class' => 'form-control','id'=>'province']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::select('location',$locations,$proveedor->domicilio->location->id,['class' => 'form-control','id'=>'location']) !!}
            </div>
</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('calle','CALLE',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('calle',$proveedor->domicilio->calle,['class' => 'form-control', 'placeholder'=>'Calle','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('numero','NUMERO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('numero',$proveedor->domicilio->numero,['class' => 'form-control', 'placeholder'=>'numero','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('barrio','BARRIO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('barrio',$proveedor->domicilio->barrio,['class' => 'form-control', 'placeholder'=>'barrio','required']) !!}
        </div>
</div>
<div class="form-group">
                {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
              </div>
{!! Form::close() !!}
@endsection