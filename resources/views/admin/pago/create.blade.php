@extends('admin.template.main')
@section('title','Creando Pago en Cuenta Corriente')
@section('content')
@section('venta','active')
{!! Form::open(['route' => 'pago.store','method'=>'POST']) !!}
<div class="row">
        <div class="col-lg-2">
                {!! Form::text('cliente_id',$cliente->id,['class' => 'form-control hidden', 'placeholder'=>'dd-mm-aaaa','required']) !!}
        </div>
        <div class="col-lg-2">
                <h3>{!! Form::label('fecha','Fecha',['class'=>'control-label']) !!} </h3>  
              </div>
              <div class="col-lg-2">
                <h3> {!! Form::text('fecha',null,['class' => 'form-control pago', 'placeholder'=>'dd-mm-aaaa','required']) !!}</h3>
              </div>
              <div class="col-lg-2">
                    <h3>{!! Form::label('monto','Monto',['class'=>'control-label']) !!} </h3>  
                  </div>
                  <div class="col-lg-2">
                    <h3> {!! Form::text('monto',null,['class' => 'form-control', 'placeholder'=>'Monto','required']) !!}</h3>
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
@section('js')
<script>
$( function() {
$( ".pago" ).datepicker();
} );
</script>
@endsection