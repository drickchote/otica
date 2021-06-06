@csrf
<div class="row mt-5">
    <div class="col-4">
        {{ Form::label('treatments', 'Tratamento: ', ['class' => '']) }}
        {{ Form::select('treatments', $lab->getUnselectedTreatments(), old('treatment'), ['class'
        =>'custom-select select2', 'id' => 'treatments']) }}
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
            <th>Descrição</th>                  
            <th>Preço</th>                  
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lab->treatments as $treatment)
            <tr>
                <td>{{ $treatment->name }}</td>
                <td>{{ $treatment->description }}</td>
                <td>{{ Money::formatMoney($treatment->pivot->price)}}</td>
                <td>                                           
                    <button onclick="detachTreatmentHandler({{$treatment->id}})" class="btn btn-sm btn-danger text-white" data-toggle="modal"
                        data-target="#lab-{{ $treatment->id }}">
                        <i class="fas fa-minus"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="7">O laboratório não possui tratamentos cadastrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>