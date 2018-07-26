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
    <hr /><hr />
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
    <hr /><hr />
    <div class="row">
        <div class="col-lg-2">
            
        </div>
    </div>
    <hr /><hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
        <div class="col-lg-2">
           <a href="" class="btn btn-danger">Crear Domicilio</a>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection