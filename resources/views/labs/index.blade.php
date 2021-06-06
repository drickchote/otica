@extends('adminlte::page')

@section('title', 'Laboratórios')

@section('content_header')
    <h1>Laboratórios</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('labs.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>                  
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($labs as $lab)
                    <tr>
                        <td>{{ $lab->name }}</td>
                        <td>{{ $lab->code }}</td>
                        <td>     
                            <a href="{{route('labs.show', ['lab' => $lab->id])}}" class="btn btn-sm btn-info"
                                data-toggle="tooltip" data-placement="top" title="Ver Detalhe">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            <a href="{{route('labs.edit', ['lab' => $lab->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Laboratório">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#lab-{{ $lab->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="lab-{{ $lab->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="labLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="labLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir este laboratório?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['labs.destroy', $lab->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="7">Você não possui laboratórios cadastrados</td>
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
