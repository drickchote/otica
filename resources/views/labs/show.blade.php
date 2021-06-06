@extends('adminlte::page')

@section('title', 'Laboratório detalhe')

@section('content_header')
    <h1>Laboratório {{$lab->name}}</h1>
    <div id="_treatments">
        @include('labs._treatments')
    </div>
@stop

@section('content')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script defer src="{{asset('js/plugins/maskMoney.js')}}"></script>
    <script defer src="{{asset('js/plugins/sweetalert.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/pages/labs/show.js')}}"></script>
@stop