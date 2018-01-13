<div class="row">
  <div class="">
    
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Datos del Hotel</div>
  <div class="panel-body">
    <dl>
      <dt>Referencia</dt>
      <dd>
        <select name="ref" class="form-control select2" style="width: 100%;">
          <option>--Seleccione--</option>
          @foreach ($references as $ref)
            <option value="{{ $ref->id }}">{{ $ref->reference }}</option>
          @endforeach
        </select>              
      </dd><br>
      <dt>Tipo de Hotel</dt>
      <dd>
        <select name="tipo_hotel" class="form-control select2" style="width: 100%;">
          <option>--Seleccione--</option>
          @foreach ($thotels as $thotel)
            <option value="{{ $thotel->id }}">{{ $thotel->type_hotel }}</option>
          @endforeach
        </select>              
      </dd><br>
      <dt>Nombre del Hotel</dt>
      <dd>
        <div class="form-group has-feedback">
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Hotel']) !!}
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
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
          {!! Form::text('contacto', null, ['class'=>'form-control', 'placeholder'=>'Contacto']) !!}
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      </dd>
      <dt>Restaurant</dt>
      <dd>
        <select name="restaurant" class="form-control select2" style="width: 100%;">
          <option>--Seleccione--</option>
          @foreach ($restaurants as $restaurant)
            <option value="{{ $restaurant->id }}">{{ $restaurant->re_name }}</option>
          @endforeach
        </select>              
      </dd><br>
    </dl>
  
    <div class="panel panel-primary">
      <div class="panel-heading">Costo por Habitacion</div>
      <div class="panel-body">
        <div class="well">
          @foreach ($rooms as $room)
            <dl>
              <dt>{{ $room->room }}</dt>
              <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('room['. $room->id .']', 0, ['class'=>'form-control', 'placeholder'=>$room->room]) !!}
                  {!! Form::hidden('hidden[]', $room->id) !!}
                  <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                </div>
              </dd>
            </dl>
          @endforeach
        </div>
      </div>
    </div>    
  </div>
</div>

  


  


