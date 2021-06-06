<div class="row">
    <div class="col-sm-4">
        {!! Form::label('code', 'Código', ['class'=>'control-label']) !!}
        {!! Form::text('code', $sunglass->code, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('brand', 'Marca', ['class'=>'control-label']) !!}
        {!! Form::text('brand', $sunglass->brand, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('type', 'Tipo', ['class'=>'control-label']) !!}
        {!! Form::text('type', $sunglass->type, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('color', 'Cor', ['class'=>'control-label']) !!}
        {!! Form::text('color', $sunglass->color, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('lens_color', 'Cor', ['class'=>'control-label']) !!}
        {!! Form::text('lens_color', $sunglass->lens_color, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('price', 'Preço', ['class'=>'control-label']) !!}
        {!! Form::text('price', Money::formatMoney($sunglass->price), ['class'=>'form-control maskMoney']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('cost', 'Custo', ['class'=>'control-label']) !!}
        {!! Form::text('cost', Money::formatMoney($sunglass->cost), ['class'=>'form-control maskMoney']) !!}
    </div>
</div>

<a href="{{route('sunglasses.index')}}" class="btn btn-secondary mt-3">Voltar</a>
{!! Form::submit('Salvar', ['class' => 'btn btn-success mt-3']) !!}




