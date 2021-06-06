@extends('adminlte::page')

@section('title', 'Editar Laboratório')

@section('content_header')
    <h1>Editar Laboratório</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['labs.update', $lab->id], 'method'=>'put']) }}
    @include('labs._form')
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="{{asset('js/plugins/maskMoney.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop
