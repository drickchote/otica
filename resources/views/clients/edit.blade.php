@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['clients.update', $client->id], 'method'=>'put']) }}
    @include('clients._form')
    {{ Form::close() }}
@stop
