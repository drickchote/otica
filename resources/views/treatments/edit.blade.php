@extends('adminlte::page')

@section('title', 'Editar Tratamento')

@section('content_header')
    <h1>Editar Tratamento</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['treatments.update', $treatment->id], 'method'=>'put']) }}
    @include('treatments._form')
    {{ Form::close() }}
@stop
