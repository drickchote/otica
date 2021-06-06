@extends('adminlte::page')

@section('title', 'Nova Lente')

@section('content_header')
    <h1>Nova Lente</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'lens.store']) }}
    @include('lens._form')
    {{ Form::close() }}
@stop

