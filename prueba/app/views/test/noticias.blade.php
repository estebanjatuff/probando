@extends('layouts.master')

@section('titulo')
	titulo desde la vista
@stop


@section('content')
<h1>Listado de las Noticias</h1>
		<table class="table table-striped">
        
        <tr>
          <td>Título</td>
          <td>Contenido</td>
        </tr>
		@foreach($datos as $dato)
        <tr>
          <td>{{$dato->titulo}}</td>
          <td>{{$dato->contenido}}</td>
        </tr>
        @endforeach
        
		</table>
        
        {{$datos->links();}}
@stop

