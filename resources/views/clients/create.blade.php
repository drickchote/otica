@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Novo Cliente</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'clients.store']) }}
    @include('clients._form')
    {{ Form::close() }}
@stop

