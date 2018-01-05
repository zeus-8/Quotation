<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-primary">
    <div class="panel-heading">Datos del Paquete</div>
      <div class="panel-body">
        <div class="form-group has-feedback">
          {!! Form::label('Nombre del Paquete') !!}
          {!! Form::text('nombre_paquete', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Paquete']) !!}
          <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          {!! Form::label('Actividades') !!}
          {!! Form::textarea ('actividades', null, ['class'=>'form-control', 'placeholder'=>'Actividades']) !!}
          <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
        <div class="form-group">
          <label>Rango de Fechas:</label>
          <div class="well">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
            <br><br>
            Hacer que cuando se seleccione la fecha con el data piker aparesca a abajo
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos de Alojamientos</div>
      <div class="panel-body">
        <select class="form-control select2" style="width: 100%;" name="hotel">
          <option>-Seleccione el Hotel-</option>
          @foreach ($hotels as $hotel)
            <option value="{{ $hotel->id }}">{{ $hotel->ho_name }}</option>
          @endforeach
        </select><br><br>
        <div class="well">
          en lo que se seleccione el hotel debe aparecer las habitaciones para este hotel
        </div>
      </div>
    </div>   
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">Servicios</div>
  <div class="panel-body">
    <div class="well">
      <select class="form-control select2" style="width: 100%;" name="local">
        <option>-Seleccione la Localidad-</option>
        @foreach ($localities as $local)
          <option value="{{ $local->id }}">{{ $local->ho_name }}</option>
        @endforeach
      </select><br><br>
      <div class="panel panel-primary">
        <div class="panel-heading">Datos de los Guias</div>
        <div class="panel-body">
          <div class="well">
            seleccion de guias
          </div>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Datos del Transporte</div>
        <div class="panel-body">
          <div class="well">
            seleccion de transfers
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  




