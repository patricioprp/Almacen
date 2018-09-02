@extends('admin.template.main')
@section('title','Editando Liquidacion')
@section('content')
@section('usuario','active')
{!! Form::open(['route' => ['liquidacion.update',$liquidacion],'method'=>'PUT']) !!}
<div class="form-group">
    <div class="row">
        <div class="col-lg-2">
            <h3>{!! Form::label('empleado','Empleado:',['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('user',$liquidacion->user->name,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                {!! Form::text('id',$liquidacion->user->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('apellido',$liquidacion->user->apellido,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('dni',$liquidacion->user->dni,['class'=>'col-lg-1 control-label']) !!}</h3>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::label('periodo','Periodo',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::select('periodo',['' => 'Seleccione un Periodo', 'Enero'=>'Enero','Febrero'=>'Febrero','Marzo'=>'Marzo','Abril'=>'Abril',
                'Mayo'=>'Mayo','Junio'=>'Junio','Julio'=>'Julio','Agosto'=>'Agosto','Septiembre'=>'Septiembre','Octubre'=>'Octubre',
                'Noviembre'=>'Noviembre','Diciembre'=>'Diciembre'],$liquidacion->periodo,['class'=>'form-control select-periodo']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('estado','Estado',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::select('estado',['' => 'Seleccione un Estado', 'liquidado'=>'liquidado','pendiente'=>'pendiente'],$liquidacion->estado,['class'=>'form-control select-estado']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-2">
                {!! Form::label('desde','Desde',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('desde',\Carbon\Carbon::parse($liquidacion->desde)->format('d-m-Y'),['class' => 'form-control', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::label('hasta','Hasta',['class'=>'control-label']) !!}
        </div>
        <div class="col-lg-2">
                {!! Form::text('hasta',\Carbon\Carbon::parse($liquidacion->hasta)->format('d-m-Y'),['class' => 'form-control', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
