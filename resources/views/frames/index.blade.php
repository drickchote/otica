@extends('adminlte::page')

@section('title', 'Armações')

@section('content_header')
    <h1>Armações</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('frames.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Cor</th>
                    <th>Preço</th>
                    <th>Custo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($frames as $frame)
                    <tr>
                        <td>{{ $frame->code }}</td>
                        <td>{{ $frame->brand }}</td>
                        <td>{{ $frame->type }}</td>
                        <td>{{ $frame->color }}</td>
                        <td>{{ Money::formatMoney($frame->price) }}</td>
                        <td>{{ Money::formatMoney($frame->cost) }}</td>
                        <td>     
                            <a href="{{route('frames.edit', ['frame' => $frame->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Armação">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#frame-{{ $frame->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="frame-{{ $frame->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="frameLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="frameLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir esta armação?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['frames.destroy', $frame->id], 'method' => 'delete']) }}

                                            {{ Form::submit('Excluir', ['class' => 'btn btn-lg btn-danger']) }}

                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="7">Você não possui armações cadastradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
