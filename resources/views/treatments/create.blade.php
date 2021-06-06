@extends('adminlte::page')

@section('title', 'Novo Tratamento')

@section('content_header')
    <h1>Novo Tratamento</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'treatments.store']) }}
    @include('treatments._form')
    {{ Form::close() }}
@stop

