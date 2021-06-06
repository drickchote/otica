<div class="row">
    <div class="col-sm-6">
        {!! Form::label('full_name', 'Nome Completo', ['class'=>'control-label']) !!}
        {!! Form::text('full_name', $client->full_name, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
        {!! Form::text('email', $client->email, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::label('fone', 'Contato principal', ['class'=>'control-label']) !!}
        {!! Form::text('fone', $client->fone, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::label('fone2', 'Contato secundário', ['class'=>'control-label']) !!}
        {!! Form::text('fone2', $client->fone2, ['class'=>'form-control']) !!}
    </div>
</div>

<a href="{{route('clients.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Salvar', ['class' => 'btn btn-success mt-3']) !!}




