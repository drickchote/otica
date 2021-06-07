@csrf
<div class="row mt-5">
    <div class="col-4">
        {{ Form::label('lens', 'Lente: ', ['class' => '']) }}
        {{ Form::select('lens', $lab->getUnselectedLens(), old('len'), ['class'
        =>'custom-select select2', 'id' => 'lens']) }}
    </div>
    <div class="col-2">
        {{ Form::label('price', 'Preço: ', ['class' => 'control-label']) }}
        {{ Form::text('price', "0,00", ['class'=>'form-control maskMoney']) }}
    </div>
    <div class="d-flex align-items-end">
        <button id="btn-attach" class="btn btn-success"><i class="fa fa-arrow-down"></i> Vincular</button>
    </div>
</div>

<table class="table datatable mt-2">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Marca</th>                  
            <th>Preço</th>                  
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lab->lens as $len)
            <tr>
                <td>{{ $len->name }}</td>
                <td>{{ $len->brand }}</td>
                <td>{{ Money::formatMoney($len->pivot->price)}}</td>
                <td>                                           
                    <button onclick="detachLenHandler({{$len->id}})" class="btn btn-sm btn-danger text-white" data-toggle="modal"
                        data-target="#lab-{{ $len->id }}">
                        <i class="fas fa-minus"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="7">O laboratório não possui lentes cadastradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>