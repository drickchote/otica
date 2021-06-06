@extends('adminlte::page')

@section('title', 'Editar Armação')

@section('content_header')
    <h1>Editar Armação</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['frames.update', $frame->id], 'method'=>'put']) }}
    @include('frames._form')
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="{{asset('js/plugins/maskMoney.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop
