<div class="row">
    <div class="col-sm-4">
        {{ Form::label('client', 'Cliente: ', ['class' => '']) }}
        {{ Form::select('client', $clients, old('client', $order->client_id), ['class' =>'custom-select select2', 'id' => 'client']) }}
    </div>
</div>

<div class="row mt-5">
    <div class="col-sm-2 d-flex align-items-end">
        <button id="btn-attach" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Item</button>
    </div>
    <div class="col-sm-2 d-flex align-items-end">
        {{ Form::select('item', ['Armação', "Lente", "Óculos de Sol"], old('item', $order->client_id), ['class' =>'custom-select select2', 'id' => 'client']) }}
    </div>
    <div id="frameContainer" class="col-sm-2 ">
        {{ Form::select('frame', $frames, old('item', $order->client_id), ['class' =>'custom-select select2', 'id' => 'frame']) }}
    </div>
    <div id="frameContainer" class="col-sm-2 d-none">
        {{ Form::select('sunglass', $sunglasses, old('item', $order->client_id), ['class' =>'custom-select select2', 'id' => 'sunglass']) }}
    </div>
    <div id="lensContainer"  class="col-sm-2 d-none">
        {{ Form::select('len', $lens, old('item', $order->client_id), ['class' =>'custom-select select2', 'id' => 'len']) }}
    </div>
</div>  

{{-- <table class="table datatable mt-2">
    <thead>
        <tr>
            <th>Item</th>
            <th>Preço</th>                  
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($order->items as $items)
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
</table> --}}


<a href="{{route('orders.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Criar Venda', ['class' => 'btn btn-primary mt-3']) !!}




