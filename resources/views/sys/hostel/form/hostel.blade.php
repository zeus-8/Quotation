<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos del Hotel</div>
        <div class="panel-body">
          <dl>
            <dt>Nombre del Hotel</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Hotel']) !!}
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
              </div>
            </dd>
            <dt>Tipo de Hotel</dt>
            <dd>
            <select name="tipo_hotel" class="form-control select2" style="width: 100%;">
              <option>--Seleccione--</option>
              @foreach ($thotels as $thotel)
                <option value="{{ $thotel->id }}">{{ $thotel->type_hotel }}</option>
              @endforeach
            </select>              
            </dd>
            <dt>Direccion</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
              </div>
            </dd>
            <dt>Celular</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Celular']) !!}
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
              </div>
            </dd>
            <dt>Fijo</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::text('telef_fijo', null, ['class'=>'form-control', 'placeholder'=>'Telefono Fijo']) !!}
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
              </div>
            </dd>
            <dt>Email</dt>
            <dd>
              <div class="form-group has-feedback">
                @if($op == 2)
                  {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com', 'disabled']) !!}
                @else
                  {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com']) !!}
                @endif
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
            </dd>
            <dt>Nombre del Contacto</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::text('telef_fijo', null, ['class'=>'form-control', 'placeholder'=>'Contacto']) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
            </dd>
          </dl>
        </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos del Restaurant</div>
      <div class="panel-body">
        <dt></dt>
        <dd>
          <div class="checkbox">
          <label><input type="checkbox" value="1">Esta en el Hotel?</label>
        </div>
        </dd>
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
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Costo de Habitacion</div>
      <div class="panel-body">
        <div class="well">
          AQUI SE APLICA LO MISMO QUE SE APLICA EN LA SELECCION DE HOTELES EN CONTIZACION DE 0
        </div>
      </div>
    </div>
  </div>
</div>  
  {{-- <div class="col-xs-12 col-sm-6 col-md-6">
    
   </div>  --}}


  


