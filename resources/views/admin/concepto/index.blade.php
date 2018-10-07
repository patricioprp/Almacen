@extends('admin.template.main')
@section('title','Listado de  Conceptos')
@section('content')
@section('usuario','active')
<h3><b>Modulo de Gestion de Conceptos</b></h3>
<a href="{{ asset('admin/concepto/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true">Crear Concepto</span></a>
   {{-- Buscador de concepto --}}
   {!! Form::open(['route' => 'concepto.index', 'method' => 'GET', 'autocomplete' => 'off',
   'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
   <div class="input-group">
       {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

       <div class="input-group-btn">
           <button type="submit" form="formSearch" class="btn btn-default">
               <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
           </button>
       </div>
   </div>
{!! Form::close() !!}
<div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
        <thead>
          <th>#</th>
          <th>DESCRIPCION</th>
          <th>TIPO</th>
          <th>IMPORTE</th>
          <th>ACCION</th>
        </thead>
        <tbody>
          @foreach ($conceptos as $concepto)
             <tr>
               <td>{{$concepto->id}}</td>
               <td>{{$concepto->descripcion}}</td>
               <td>
                @if ($concepto->tipo == "haberes")
                   <span class="label label-success">{{$concepto->tipo}}</span>
                @else
                  <span class="label label-danger">{{$concepto->tipo}}</span>
                @endif
               </td>
               <td>{{$concepto->importe}}</td>
               <td><a href="{{route('admin.concepto.destroy',$concepto->id)}}" onclick="return confirm('Desea eliminar a {{$concepto->descripcion}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                <a href="{{route('concepto.edit',$concepto->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              </td>
             </tr>
          @endforeach
    
        </tbody>
      </table>
      </div>
      </div>
      <p></p>
    {!! $conceptos->render() !!}
@endsection