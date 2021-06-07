@extends('adminlte::page')

@section('title', 'Vendas')

@section('content_header')
    <h1>Vendas</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('orders.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ (new \Carbon\Carbon($order->created_at))->locale('br')->format('d/m/Y') }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>     
                            <a href="{{route('orders.edit', ['order' => $order->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Armação">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#order-{{ $order->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="order-{{ $order->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="orderLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="orderLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir esta venda?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="7">Você não possui vendas cadastradas</td>
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
