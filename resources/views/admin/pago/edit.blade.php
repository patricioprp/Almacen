@extends('admin.template.main')
@section('title','EditandoPago en Cuenta Corriente')
@section('content')
@section('venta','active')
{!! Form::open(['route' => ['pago.update',$pago],'method'=>'PUT']) !!}
<div class="form-group">
        <div class="col-lg-2">
                {!! Form::text('pago_id',$pago->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('fecha','Fecha',['class'=>'control-label']) !!} </h3>  
              </div>
              <div class="col-lg-2">
                <h3> {!! Form::text('fecha',$pago->fecha,['class' => 'form-control', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h3>
              </div>
              <div class="col-lg-2">
                    <h3>{!! Form::label('monto','Monto',['class'=>'control-label']) !!} </h3>  
                  </div>
                  <div class="col-lg-2">
                    <h3> {!! Form::text('monto',$pago->monto,['class' => 'form-control', 'placeholder'=>'Monto','required']) !!}</h3>
                  </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-2">
                        {!! Form::submit('Registrar',['class'=>'btn btn-warning']) !!}
                </div>
            </div>

{!! Form::close() !!}
@endsection