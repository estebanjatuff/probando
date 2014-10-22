@extends('layouts.master')

@section('titulo')
	titulo desde la vista
@stop


@section('content')
<h1>Agregar Noticia</h1>

@if(Session::has('mensaje'))
	<h3>{{Session::get('mensaje')}}</h3>

@endif 
   
	{{ Form::open(array('url' => 'test/add','method'=>'post','name'=>'form', 'files'=>true)) }}
    	
      {{Form::label('titulo', 'Título');}} {{Form::text('titulo');}} 
      {{$errors->first("titulo")}}
      <br>
      <br>
      {{Form::label('contenido', 'Contenido');}} {{Form::textarea('contenido');}} 
      {{$errors->first("contenido")}}
      <br>
      <br>
      {{Form::label('archivo', 'Archivo');}} {{Form::file('archivo');}}
      <br>
      <hr>
    {{Form::submit('Enviar')}}
    <button type="button" class="btn btn-primary">Primary</button>
      <br>
	{{ Form::close() }}

@stop

