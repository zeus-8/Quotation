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
          </dl>
        </div>
    </div>
  </div>
  
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Agregar Habitacion</div>
      <div class="panel-body">
        <dl>
        {{-- <dt></dt>
        <dd>
          <a class="btn btn-success btn-lg btn-block btn-sm" data-toggle="modal" data-target="#modal-default">Agregar Habitacion</a>
        </dd><br> --}}
        <dt>Habitaciones</dt>
        <dd>
          <select multiple="" class="form-control" size="13" name="hotel[]">
            @foreach ($rooms as $room)
              <option value="{{ $room->id }}">{{ $room->descripcion }}</option>
            @endforeach
          </select>
        </dd>
        <dt></dt>
        <dd></dd>
        <dt></dt>
        <dd></dd>
      </dl>
      </div>
    </div>
    {{-- <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-bed"></i> Agregar Habitación</h4>
          </div>
          <div class="modal-body">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">Nueva Habitacion</h3>
              </div>
              <div class="box-body">
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'bed.store', 'method'=>'POST']) !!}
                     @include('sys.bedroom.form.bedroom')
                     <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
                    </div>
                  {!! Form::close() !!}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Costo de Alimentación</div>
        <div class="panel-body">
          <dl class="dl-horizontal">
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
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Costo de Habitación por Noche</div>
        <div class="panel-body">
          {{-- <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
          @foreach ($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->descripcion }}</option>
          @endforeach
        </select> --}}
        Habitaciones seleccionadas
        </div>
      </div>
    </div>
  </div>  
  {{-- <div class="col-xs-12 col-sm-6 col-md-6">
    
   </div>  --}}


  


