<div class="form-group has-feedback">
  {!! Form::label('Nombre del Hotel') !!}
  {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Hotel']) !!}
  <span class="glyphicon glyphicon-home form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Direccion') !!}
  {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
  <span class="glyphicon glyphicon-home form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Telefono Celular') !!}
  {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Celular']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Telefono Fijo') !!}
  {!! Form::text('telef_fijo', null, ['class'=>'form-control', 'placeholder'=>'Telefono Fijo']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Email') !!}
  @if($op == 2)
    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com', 'disabled']) !!}
  @else
    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com']) !!}
  @endif
  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Costo de Alimentación</div>
  <div class="panel-body">
    <dl class="dl-horizontal">
      <dt>Costo del Desayuno</dt>
      <dd>
        <div class="form-group has-feedback">
          {!! Form::text('costo_desayuno', null, ['class'=>'form-control', 'placeholder'=>'Costo por Desayuno']) !!}
          <span class="glyphicon glyphicon-usd form-control-feedback"></span>
        </div>
      </dd>
      <dt>Costo del Almuerso</dt>
      <dd>
        <div class="form-group has-feedback">
          {!! Form::text('costo_almuerzo', null, ['class'=>'form-control', 'placeholder'=>'Costo por Almuerzo']) !!}
          <span class="glyphicon glyphicon-usd form-control-feedback"></span>
        </div>
      </dd>
      <dt>Costo de la Cena</dt>
      <dd>
        <div class="form-group has-feedback">
          {!! Form::text('costo_cena', null, ['class'=>'form-control', 'placeholder'=>'Costo por Cena']) !!}
          <span class="glyphicon glyphicon-usd form-control-feedback"></span>
        </div>
      </dd>
    </dl>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Costo de Habitación por Noche</div>
  <div class="panel-body">
    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
    @foreach ($rooms as $room)
      <option value="{{ $room->id }}">{{ $room->descripcion }}</option>
    @endforeach
  </select>
  </div>
</div>