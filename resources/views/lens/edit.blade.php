@extends('adminlte::page')

@section('title', 'Editar Lente')

@section('content_header')
    <h1>Editar Lente</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['lens.update', $len->id], 'method'=>'put']) }}
    @include('lens._form')
    {{ Form::close() }}
@stop

