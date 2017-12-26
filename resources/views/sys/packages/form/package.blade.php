<div class="row">
  <div class="col-xs-6 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Datos del Paquete</div>
          <div class="panel-body">
            <div class="form-group">
              <label>Rango de Fechas:</label>
              <div class="btn-group">
                <button id="add" type="button" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Agregar</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-minus"></i> Quitar</button>
              </div>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="reservation" name="fecha">
              </div>
            </div>
            <div class="form-group has-feedback">
              {!! Form::label('Nombre del Paquete') !!}
              {!! Form::text('nombre_paquete', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Paquete']) !!}
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              {!! Form::label('Descripcion') !!}
              {!! Form::textarea ('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion del Paquete']) !!}
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
          </div>
        </div>
  </div>
  <div class="col-xs-6 col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos de Alojamientos</div>
      <div class="panel-body">
        {{-- <select class="form-control select2" style="width: 100%;" name="hotel">
          <option>-Seleccione el Hotel-</option>
          @foreach ($hotels as $hotel)
            <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
          @endforeach
        </select><br><br> --}}
        <div class="panel box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
              Nombre del hotel seleccionado
              </a>
            </h4>
          </div>
          <div id="collapse" class="panel-collapse collapse in">
            <div class="box-body">
              <dl class="dl-horizontal">
               {{--  @foreach ($rooms as $room)
                  <dt>{{ $room->descripcion }}</dt>
                  <dd>
                    <div class="form-group has-feedback">
                      {!! Form::checkbox('habitacion', $room->id) !!}
                    </div>
                  </dd>
                  @endforeach   --}}
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos del Transporte</div>
      <div class="panel-body">
        <dl class="dl-horizontal">
          {{-- @foreach ($transfers as $transfer)
            <dt>{{ $transfer->nombre }}</dt>
            <dd>
              <div class="form-group has-feedback">
                {!! Form::checkbox('transporte', $transfer->id) !!}
              </div>
            </dd>
          @endforeach --}}
        </dl>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos de los Guias</div>
      <div class="panel-body">
        {{-- @foreach ($guides as $guide)
          <dt>{{ $guide->descripcion }}</dt>
          <dd>
            <div class="form-group has-feedback">
              {!! Form::checkbox('guias', $guide->id) !!}
            </div>
          </dd>
        @endforeach --}}
      </div>
    </div>
  </div>
</div>




