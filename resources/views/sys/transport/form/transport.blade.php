<div class="form-group has-feedback">
  {!! Form::label('Empresa') !!}
  <label for=""><a href="" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Agregar Empresa</a></label>
  <select class="form-control" name="empresa">
    <option>- Seleccione -</option>
    @foreach($companies as $companie)
      @if($op == 2)
        <option value="{{ $companie->id }}" <?php if ($companie->id == $transport1->companie_id){ ?> SELECTED <?php } ?>>{{ $companie->co_name }}</option>
      @else
        <option value="{{ $companie->id }}">{{ $companie->co_name }}</option>
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
  @if ($op == 2)
    {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula del Chofer', 'disabled']) !!}
  @else
    {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula del Chofer']) !!}
  @endif
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
    <option>- Seleccione -</option>
    @foreach($transfers as $transfer)
      @if($op == 2)
        <option value="{{ $transfer->id }}" <?php if ($transfer->id == $transport1->ttransfer_id){ ?> SELECTED <?php } ?>>{{ $transfer->tt_transfer }}</option>
      @else
        <option value="{{ $transfer->id }}">{{ $transfer->tt_transfer }}</option>
      @endif 
    @endforeach
  </select>    
</div>
<div class="form-group has-feedback">
  {!! Form::label('Descripcion') !!}
  <p class="text-aqua"><i class="fa fa-info-circle"></i> Si el transporte no lleva descripcion rellene con 3 guiones (---) </p>
  {!! Form::textarea ('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion']) !!}
</div>