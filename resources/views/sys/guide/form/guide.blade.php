<div class="form-group has-feedback">
  {!! Form::label('Nombre') !!}
  {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Apellido') !!}
  {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Apellido']) !!}
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Cedula') !!}
  @if ($op == 2)
    {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula', 'disabled']) !!}
  @else
    {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula']) !!}
  @endif
  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Telefono Celular') !!}
  {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Celular']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Telefono Fijo') !!}
  {!! Form::text('telef_fijo', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Casa']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Direccion') !!}
  {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Casa']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Email') !!}
  @if($op == 2)
    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com', 'disabled']) !!}
  @else
    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com']) !!}
  @endif
  <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Costo') !!}
  {!! Form::text('costo', null, ['class'=>'form-control', 'placeholder'=>'Costo']) !!}
  <span class="glyphicon glyphicon-usd form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Referencia') !!}
    <select class="form-control" name="ref">
      <option>-- Seleccione --</option>
      @foreach($references as $ref)
        @if($op == 2)
          <option value="{{ $ref->id }}" <?php if ($ref->id == $guide->reference_id){ ?> SELECTED <?php } ?>>{{ $ref->reference }}</option>
        @else
          <option value="{{ $ref->id }}">{{ $ref->reference }}</option>
        @endif 
      @endforeach
    </select>
</div>
