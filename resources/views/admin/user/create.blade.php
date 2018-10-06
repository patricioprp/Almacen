@extends('admin.template.main')
@section('title','Creando Empleado')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => 'user.store','method'=>'POST']) !!}

<div class="form-group">
    <div class="row">
       <div class="col-lg-2">
         {!! Form::label('name','NOMBRE',['class'=>'control-label']) !!}
       </div>
         <div class="col-lg-2">
          {!! Form::text('name',null,['class' => 'form-control', 'placeholder'=>'Nombre','required']) !!}
         </div>
         <div class="col-lg-2">
          {!! Form::label('apellido','APELLIDO',['class'=>'control-label']) !!}
         </div>
         <div class="col-lg-2">
          {!! Form::text('apellido',null,['class' => 'form-control', 'placeholder'=>'Apellido','required']) !!}
         </div>   
         <div class="col-lg-2">
          {!! Form::label('dni','DNI',['class'=>'control-label']) !!}
         </div>
         <div class="col-lg-2">
          {!! Form::text('dni',null,['class' => 'form-control', 'placeholder'=>'Dni','required']) !!}
         </div> 
    </div>
    <hr />
    <div class="row">
      <div class="col-lg-2">
        {!! Form::label('turno','TURNO',['class'=>'control-label']) !!}
      </div>
        <div class="col-lg-2">
         {!! Form::text('turno',null,['class' => 'form-control', 'placeholder'=>'Turno','required']) !!}
        </div>
         <div class="col-lg-2">
            {!! Form::label('telefono','TELEFONO',['class'=>'control-label']) !!}
         </div>
            <div class="col-lg-2">
               {!! Form::text('telefono',null,['class' => 'form-control', 'placeholder'=>'Telefono','required']) !!}
            </div>
              <div class="col-lg-2">
                {!! Form::label('password','Contraseña',['class'=>'control-label']) !!}
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
           {!! Form::text('email',null,['class' => 'form-control', 'placeholder'=>'Correo','required']) !!}
        </div>
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
    <hr />
    <div class="row">
        <div class="col-lg-2">
            {!! Form::label('type','TIPO',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('type',['' => 'Seleccione un Tipo', 'admin'=>'Administrador','member'=>'Miembro'],null,['class'=>'form-control']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
