@extends('adminlte::page')

@section('title', "Laboratório")

@section('content_header')
    @if($screen === "lens")
        <div id="_lens" class="pt-3">
            <h2>Lentes do laboratório {{$lab->name}}</h2>
            @include('labs._lens')
        </div>
    @else
        <div id="_treatments" class="pt-3">
            <h2>Tratamentos do laboratório {{$lab->name}}</h2>
            @include('labs._treatments')
        </div>
    @endif
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