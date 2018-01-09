  <dl>
    <dt>Nombre</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('nombre_restaurant', null, ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
        <span class="glyphicon glyphicon-glass form-control-feedback"></span>
      </div>
    </dd>
    <dt>Direccion</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('direccion_restaurant', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
      </div>
    </dd>
    <dt>Celular</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('celular_restaurant', null, ['class'=>'form-control', 'placeholder'=>'Celular']) !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
    </dd>
    <dt>Fijo</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('fijo_restaurant', null, ['class'=>'form-control', 'placeholder'=>'Fijo']) !!}
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
    </dd>
    <dt>Costo del Desayuno</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('costo_desayuno', null, ['class'=>'form-control', 'placeholder'=>'Desayuno']) !!}
        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
      </div>
    </dd>
    <dt>Costo del Almuerso</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('costo_almuerzo', null, ['class'=>'form-control', 'placeholder'=>'Almuerzo']) !!}
        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
      </div>
    </dd>
    <dt>Costo de la Cena</dt>
    <dd>
      <div class="form-group has-feedback">
        {!! Form::text('costo_cena', null, ['class'=>'form-control', 'placeholder'=>'Cena']) !!}
        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
      </div>
    </dd>
  </dl>
