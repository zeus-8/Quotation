<div class="panel panel-primary">
  <div class="panel-heading">Alojamiento</div>
  <div class="panel-body">
    <div class="form-group">
      <select class="form-control select2" style="width: 100%;" name="hotel">
        <option>--Referencia--</option>
        @foreach ($references as $reference)
          <option value="{{ $reference->id }}" {{-- @if ($reference->id == $hotel->id)
                                          SELECTED
                                        @endif--}}>{{ $reference->reference }} </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <select class="form-control select2" style="width: 100%;" name="hotel">
        <option>--Localidad--</option>
        @foreach ($localities as $localitie)
          <option value="{{ $localitie->id }}" {{-- @if ($hotel->id == $hotel->id)
                                          SELECTED
                                        @endif--}}>{{ $localitie->localitie }} </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <select class="form-control select2" style="width: 100%;" name="hotel">
        <option>--Hotel--</option>
        @foreach ($hotels as $hotel)
          <option value="{{ $hotel->id }}" {{-- @if ($hotel->id == $hotel->id)
                                          SELECTED
                                        @endif--}}>{{ $hotel->ho_name }} </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
    <div class="panel panel-primary">
      <div class="panel-heading">Habitaciones</div>
      <div class="panel-body">
        <div class="well">res de habitaciones para hoteles</div>
        <div class="form-group col-md-3">
          {!! Form::label('Cant de Noches ') !!}
          {!! Form::text('Noches', null, ['class'=>'form-control', 'placeholder'=>'Cant Noches']) !!}
        </div>
      </div>
    </div>
<div class="panel panel-primary">
  <div class="panel-heading">Alimentacion</div>
  <div class="panel-body">
    <div class="form-group col-md-4">
      {!! Form::label('Desayuno') !!}
      {!! Form::text('desayuno', null, ['class'=>'form-control', 'placeholder'=>'Desayuno']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Almuerzo') !!}
      {!! Form::text('almuerzo', null, ['class'=>'form-control', 'placeholder'=>'Almuerzo']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Cena') !!}
      {!! Form::text('cena', null, ['class'=>'form-control', 'placeholder'=>'Cena']) !!}
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Guias</div>
  <div class="panel-body">
    <div class="well">
      @foreach ($guides as $guide)
        <div class="checkbox">
          <label><input type="checkbox" name="guides[]" value="{{ $guide->id }}"> {{ $guide->gu_name }}</label>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Transfers</div>
  <div class="panel-body">
      <div class="well">filtrado de localidades para transfers</div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Ticket Aereo</div>
  <div class="panel-body">
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Adulto') !!}
      {!! Form::text('ticket_adulto', null, ['class'=>'form-control', 'placeholder'=>'Ticket Adulto']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Adulto') !!}
      {!! Form::text('impuesto_adulto', null, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Niño') !!}
      {!! Form::text('ticket_nino', null, ['class'=>'form-control', 'placeholder'=>'Ticket Niño']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Niño') !!}
      {!! Form::text('impuesto_nino', null, ['class'=>'form-control', 'placeholder'=>'Impuesto Niño']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Tercera Edad') !!}
      {!! Form::text('ticket_tercera_edad', null, ['class'=>'form-control', 'placeholder'=>'Ticket Tercera Edad']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Tercera Edad') !!}
      {!! Form::text('impuesto_tercera_edad', null, ['class'=>'form-control', 'placeholder'=>'Impuesto Tercera Edad']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Extranjero') !!}
      {!! Form::text('ticket_extranjero', null, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Extranjero') !!}
      {!! Form::text('impuesto_Extranjero', null, ['class'=>'form-control', 'placeholder'=>'Impuesto Extranjero']) !!}
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Calculo por Persona</div>
  <div class="panel-body">
    <div class="form-group col-md-3">
      {!! Form::label('Adulto(s)') !!}
      {!! Form::text('adulto', null, ['class'=>'form-control', 'placeholder'=>'Adulto']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('Niño(s)') !!}
      {!! Form::text('nino', null, ['class'=>'form-control', 'placeholder'=>'Niño']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('Tercera Edad') !!}
      {!! Form::text('adulto_mayor', null, ['class'=>'form-control', 'placeholder'=>'Tercera Edad']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('Extranjero(s)') !!}
      {!! Form::text('extranjero', null, ['class'=>'form-control', 'placeholder'=>'Extranjero']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('Descrion') !!}
      {!! Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion']) !!}
    </div>
  </div>
</div>