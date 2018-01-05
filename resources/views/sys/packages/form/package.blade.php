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
            </div>
            {{-- @foreach ($dates as $date)
              <dl class="dl-horizontal">
                <dt>{{ $date->da_date }}</dt>
                <dd>{{ $date->da_date_init }} / {{ $date->da_date_end }} <INPUT TYPE="CHECKBOX" NAME="fechas[]" VALUE="{{ $date->id }}"></dd>
              </dl>
            @endforeach --}}
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Agregar</th>
                </tr>
              </thead>
              @foreach ($dates as $date)
                <tr>
                <td>{{ $date->id }}</td>
                <td>{{ $date->da_date }}</td>
                <td>{{ $date->da_date_init }}</td>
                <td>{{ $date->da_date_end }}</td>
                <td><INPUT TYPE="CHECKBOX" NAME="fecha[]" VALUE="{{ $date->id }}"></td>
              </tr>
              @endforeach
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Agregar</th>
                </tr>
              </tfoot>
            </table>
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
{{-- <div class="row"> --}}
  {{-- <div class="col-xs-6 col-sm-6"> --}}
    <div class="panel panel-primary">
      <div class="panel-heading">Datos del Transporte</div>
      <div class="panel-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Compañia</th>
              <th>Costo</th>
              <th>Tipo de Transfer</th>
              <th>Agregar</th>
            </tr>
          </thead>
          @foreach ($transfers as $transfer)
            <tr>
              <td>{{ $transfer->id }}</td>
              <td>{{ $transfer->tr_name }}</td>
              <td>{{ $transfer->tr_last_name }}</td>
              <td>{{ $transfer->co_name }}</td>
              <td>{{ $transfer->tr_cost }}</td>
              <td>{{ $transfer->tt_transfer }}</td>
              <td><INPUT TYPE="CHECKBOX" NAME="transfer[]" VALUE="{{ $transfer->id }}"></td>
            </tr>
          @endforeach
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Compañia</th>
              <th>Costo</th>
              <th>Tipo de Transfer</th>
              <th>Agregar</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  {{-- </div> --}}
  {{-- <div class="col-xs-6 col-sm-6"> --}}
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
  {{-- </div> --}}
{{-- </div> --}}




