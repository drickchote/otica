@extends('adminlte::page')

@section('title', 'Lançar Venda')

@section('content_header')
    <h1>Nova Venda</h1>
@stop

@section('content')
    {{ Form::open(['route' => 'orders.store']) }}
    @include('orders._form')
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="{{asset('js/plugins/maskMoney.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop