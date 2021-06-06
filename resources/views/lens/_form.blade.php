<div class="row">
    <div class="col-sm-4">
        {!! Form::label('name', 'Nome', ['class'=>'control-label']) !!}
        {!! Form::text('name', $len->name, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('brand', 'Marca', ['class'=>'control-label']) !!}
        {!! Form::text('brand', $len->brand, ['class'=>'form-control']) !!}
    </div>
</div>



<a href="{{route('lens.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Salvar', ['class' => 'btn btn-success mt-3']) !!}




