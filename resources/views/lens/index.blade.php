@extends('adminlte::page')

@section('title', 'Lentes')

@section('content_header')
    <h1>Lentes</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('lens.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Marca</th>                  
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lens as $len)
                    <tr>
                        <td>{{ $len->name }}</td>
                        <td>{{ $len->brand }}</td>
                        <td>     
                            <a href="{{route('lens.edit', ['len' => $len->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar produto">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#len-{{ $len->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="len-{{ $len->id }}" tabindex="-1" role="dialog"
                                aria-lenelledby="lenLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="lenLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-lenel="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir esta lente?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['lens.destroy', $len->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="7">Você não possui lentes cadastradas</td>
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
