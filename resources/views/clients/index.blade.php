@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('clients.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Contato 1</th>
                    <th>Contato 2</th>
                    <th>Email</th>
                    <th>Data criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                    <tr>
                        <td>{{ $client->full_name }}</td>
                        <td>{{ $client->fone }}</td>
                        <td>{{ $client->fone2 }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ (new \Carbon\Carbon($client->created_at))->locale('br')->format('d/m/Y') }}</td>
                        <td>     
                            <a href="{{route('clients.edit', ['client' => $client->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#client-{{ $client->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="client-{{ $client->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="clientLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="clientLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir este cliente?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="5">Você não possui clientes cadastrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@stop

