@extends('adminlte::page')

@section('title', 'Óculos de Sol')

@section('content_header')
    <h1>Óculos de Sol</h1>
@stop

@section('content')
    @if(session('message'))
    <div class="bg-success p-3 rounded">
        {{session('message')}}
    </div>
    @endif
    <div class="mt-5">
        <a href="{{ route('sunglasses.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
        <table class="table datatable mt-2">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Cor</th>
                    <th>Cor da lente</th>
                    <th>Preço</th>
                    <th>Custo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sunglasses as $sunglass)
                    <tr>
                        <td>{{ $sunglass->code }}</td>
                        <td>{{ $sunglass->brand }}</td>
                        <td>{{ $sunglass->type }}</td>
                        <td>{{ $sunglass->color }}</td>
                        <td>{{ $sunglass->lens_color }}</td>
                        <td>{{ Money::formatMoney($sunglass->price) }}</td>
                        <td>{{ Money::formatMoney($sunglass->cost) }}</td>
                        <td>     
                            <a href="{{route('sunglasses.edit', ['sunglass' => $sunglass->id])}}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" data-placement="top" title="Editar Armação">
                                <i class="fas fa-pencil-alt"></i>
                            </a>                   
                            <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                data-target="#sunglass-{{ $sunglass->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal de exclusão -->
                            <div class="modal fade" id="sunglass-{{ $sunglass->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="sunglassLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header alert alert-warning" role="alert">
                                            <h5 class="modal-title" id="sunglassLabel">Atenção!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja excluir este óculos?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>

                                            {{ Form::open(['route' => ['sunglasses.destroy', $sunglass->id], 'method' => 'delete']) }}

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
                        <td class="text-center" colspan="7">Você não possui óculos escuros cadastrados</td>
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
