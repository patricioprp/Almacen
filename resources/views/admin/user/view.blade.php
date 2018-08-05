@extends('admin.template.main')
@section('title','Liquidacion de Sueldo')
@section('content')
@section('usuario','active')
{{$dliq->liquidacion->user->name}}
@endsection