@extends('adminlte::page')

@section('title', 'Criar Armação')

@section('content_header')
    <h1>Nova Armação</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'frames.store']) }}
    @include('frames._form')
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="js/plugins/maskMoney.js"></script>
    <script defer src="js/scripts.js"></script>
@stop
