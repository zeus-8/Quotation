<div class="form-group has-feedback">
  {!! Form::label('Empresa') !!}
    <select class="form-control" name="empresa">
      <option>-- Seleccione --</option>
      @foreach($business as $company)
        @if($op == 2)
          <option value="{{ $company->id }}" <?php if ($company->id == $user->id_tu){ ?> SELECTED <?php } ?>>{{ $company->nombre }}</option>
        @else
          <option value="{{ $company->id }}">{{ $company->nombre }}</option>
        @endif 
      @endforeach
    </select>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Nombre del del Chofer') !!}
  {!! Form::text('nombre_chofer', null, ['class'=>'form-control', 'placeholder'=>'Nombre del del Chofer']) !!}
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Apellido del Chofer') !!}
  {!! Form::text('apellido_chofer', null, ['class'=>'form-control', 'placeholder'=>'Apellido del Chofer']) !!}
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Cedula del Chofer') !!}
  {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula del Chofer']) !!}
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Telefono del Chofer') !!}
  {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono del Chofer']) !!}
  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Tipo de Transporte') !!}
    <select class="form-control" name="transporte">
      <option>-- Seleccione --</option>
      @foreach($transports as $transport)
        @if($op == 2)
          <option value="{{ $transport->id }}" <?php if ($transport->id == $user->id_tu){ ?> SELECTED <?php } ?>>{{ $transport->descripcion }}</option>
        @else
          <option value="{{ $transport->id }}">{{ $transport->descripcion }}</option>
        @endif 
      @endforeach
    </select>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Descripcion') !!}
  {!! Form::textarea ('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion']) !!}
  <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
</div>
