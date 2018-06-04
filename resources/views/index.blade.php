@extends('layouts.main')
@section('content')
{!! Form::select('state',$states,null,['id' =>'state','placeholder'=>'Seleccione un Pais'])!!}

{!! Form::select('province',['placeholder'=>'Seleccion una Provincia'],null,['id'=>'province'])!!}

{!! Form::select('location',['placeholder'=>'Selecciona una Localidad'],null,['id'=>'location'])!!}
@endsection