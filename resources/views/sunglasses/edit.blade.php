@extends('adminlte::page')

@section('title', 'Editar Óculos')

@section('content_header')
    <h1>Editar Óculos</h1>
@stop

@section('content')
    {{ Form::open(['route' => ['sunglasses.update', $sunglass->id], 'method'=>'put']) }}
    @include('sunglasses._form')
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="{{asset('js/plugins/maskMoney.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop
