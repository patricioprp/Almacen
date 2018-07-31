@extends('admin.template.main')
@section('title','Editando Empleado')
@section('content')
<h2>Editar Usuario {{$user->name}} {{$user->apellido}}</h2>
@section('usuario','active')
{!! Form::open(['route' => ['user.update',$user],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-lg-2">
            {!! Form::label('name','NOMBRE',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('name',$user->name,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
            {!! Form::text('domicilio',$user->domicilio_id,['class' => 'form-control hidden', 'placeholder'=>'Nombre','required']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::label('apellido','APELLIDO',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('apellido',$user->apellido,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::label('dni','DNI',['class'=>'control-label']) !!}
    </div>
    <div class="col-lg-2">
            {!! Form::text('dni',$user->dni,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
    </div>
</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('turno','TURNO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('turno',$user->turno,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('telefono','TELEFONO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('telefono',$user->telefono,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('contraseña','CONTRASEÑA',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::password('password',['class' => 'form-control', 'placeholder'=>'****************','required']) !!}
        </div>

</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('email','CORREO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('email',$user->email,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
        </div> 
        <div class="col-lg-2">
                {!! Form::select('state',$states,$user->domicilio->location->province->state->id,['class' => 'form-control','id'=>'state']) !!}    
        </div>
        <div class="col-lg-2">
                {!! Form::select('province',$provinces,$user->domicilio->location->province->id,['class' => 'form-control','id'=>'province']) !!}
            </div>
            <div class="col-lg-2">
                    {!! Form::select('location',$locations,$user->domicilio->location->id,['class' => 'form-control','id'=>'location']) !!}
            </div>
</div>
<hr />
<div class="row">
        <div class="col-lg-2">
                {!! Form::label('calle','CALLE',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('calle',$user->domicilio->calle,['class' => 'form-control', 'placeholder'=>'Calle','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('numero','NUMERO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('numero',$user->domicilio->numero,['class' => 'form-control', 'placeholder'=>'numero','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('barrio','BARRIO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('barrio',$user->domicilio->barrio,['class' => 'form-control', 'placeholder'=>'barrio','required']) !!}
        </div>
</div>
<div class="form-group">
                {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
              </div>
{!! Form::close() !!}
@endsection
