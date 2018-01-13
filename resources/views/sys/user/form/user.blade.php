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
    {!! Form::label('Telefono Casa') !!}
    {!! Form::text('telef_casa', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Casa']) !!}
    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    {!! Form::label('Telefono Celular') !!}
    {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Celular']) !!}
    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    {!! Form::label('Email') !!}
    @if($op == 2)
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com', 'disabled']) !!}
    @else
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com']) !!}
    @endif
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  {!! Form::label('Rol') !!}
    <select class="form-control" name="rol">
      <option>-- Seleccione --</option>
      @foreach($role as $rol)
        @if($op == 2)
          <option value="{{ $rol->id }}" <?php if ($rol->id == $user->tuser_id){ ?> SELECTED <?php } ?>>{{ $rol->type_user }}</option>
        @else
          <option value="{{ $rol->id }}">{{ $rol->type_user }}</option>
        @endif 
      @endforeach
    </select>
</div>