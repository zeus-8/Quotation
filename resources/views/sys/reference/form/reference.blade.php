 {!! Form::label('Referencia') !!}
<select class="form-control" name="localidad">
  <option>-- Seleccione --</option>
    @foreach($localities as $local)
        @if($op == 2)
            <option value="{{ $local->id }}"@foreach ($ref as $re)
                                                @if($local->id == $re->localitie)
                                                    selected
                                                @endif 
                                            @endforeach
                                            >{{ $local->localitie }}</option>
        @else
            <option value="{{ $local->id }}">{{ $local->localitie }}</option>
        @endif 
    @endforeach
</select><br>
<div class="form-group has-feedback">
    {!! Form::label('Referencia') !!}
    @if ($op == 2)
        @foreach ($ref as $re)
            {!! Form::text('referencia', $re->reference, ['class'=>'form-control', 'placeholder'=>'Referencia']) !!}
        @endforeach
    @else
        {!! Form::text('referencia', null, ['class'=>'form-control', 'placeholder'=>'Referencia']) !!}

    @endif
    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
</div>