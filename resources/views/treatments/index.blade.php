@extends('adminlte::page')

@section('title', 'Tratamentos')

@section('content_header')
    <h1>Tratamentos</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('treatments.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>                  
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($treatments as $treatment)
                    <tr>
                        <td>{{ $treatment->name }}</td>
                        <td>{{ $treatment->description }}</td>
                        <td>     
                            <a href="{{route('treatments.edit', ['treatment' => $treatment->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Tratamento">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#treatment-{{ $treatment->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="treatment-{{ $treatment->id }}" tabindex="-1" role="dialog"
                                aria-treatmentelledby="treatmentLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="treatmentLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-treatmentel="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir este Tratamento?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['treatments.destroy', $treatment->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="7">Você não possui Tratamento cadastrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@stop
