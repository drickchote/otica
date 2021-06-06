@extends('adminlte::page')

@section('title', 'Criar Laboratório')

@section('content_header')
    <h1>Novo Laboratório</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'labs.store']) }}
    @include('labs._form')
    {{ Form::close() }}
@stop

