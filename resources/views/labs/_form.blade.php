<div class="row">
    <div class="col-sm-4">
        {!! Form::label('name', 'Nome', ['class'=>'control-label']) !!}
        {!! Form::text('name', $lab->name, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('code', 'Código', ['class'=>'control-label']) !!}
        {!! Form::text('code', $lab->code, ['class'=>'form-control']) !!}
    </div>
</div>



<a href="{{route('labs.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Salvar', ['class' => 'btn btn-success mt-3']) !!}




