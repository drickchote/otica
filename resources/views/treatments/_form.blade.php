<div class="row">
    <div class="col-sm-4">
        {!! Form::label('name', 'Nome', ['class'=>'control-label']) !!}
        {!! Form::text('name', $treatment->name, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('description', 'Descrição', ['class'=>'control-label']) !!}
        {!! Form::textarea('description', $treatment->description, ['class'=>'form-control','rows'=>'4']) !!}
    </div>
</div>



<a href="{{route('treatments.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Salvar', ['class' => 'btn btn-success mt-3']) !!}




