<div class="panel panel-primary">
  <div class="panel-heading">Datos del Cliente</div>
    <div class="panel-body">
      <div class="form-group">
        
      </div> 
      {{-- <div class="panel panel-primary">
        <div class="panel-heading">Habitacion</div>
          <div class="panel-body">
            <div class="form-group">
              
            </div>  
          </div>
      </div> --}}
    </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Datos del Paquete</div>
          <div class="panel-body">
            <div class="form-group">
              <select class="form-control select2" style="width: 100%;" name="hotel">
                <option>-Seleccione el Paquete-</option>
                @foreach ($pakages as $pakage)
                  <option value="{{ $pakage->id }}">{{ $pakage->pa_name }}</option>
                @endforeach
              </select>
              <div class="form-group has-feedback">
                {!! Form::label('Cantidad') !!}
                {!! Form::text('nombre_paquete', null, ['class'=>'form-control', 'placeholder'=>'Cantidad de Adultos']) !!}
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
              </div>
              <div class="box-body">
                <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-danger">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          PAQUETES <i class="fa fa-chevron-down"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="box-body">
                        <div class="well">
                          <b>ACTIVADES</b><br>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
      </div>
  </div>
  <div class="col-xs-6 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Costos</div>
          <div class="panel-body">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>COSTO</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-usd"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div> 
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Datos de Alojamiento</div>
        <div class="panel-body">
          {{--<div class="form-group">
             <select class="form-control select2" style="width: 100%;" name="hotel">
              <option>--Seleccione Hotel--</option>
              @foreach ($hotels as $res)
                <option value="{{ $res->id }}" @if ($res->id == $hotel->id)
                                                SELECTED
                                              @endif>{{ $res->nombre }}</option>
              @endforeach
            </select>
          </div>--}}
          <div class="panel panel-primary">
            <div class="panel-heading">Habitacion</div>
            <div class="panel-body">
              {{-- <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="hotel">
                  <option>--Seleccione Habitacion--</option>
                  @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->descripcion }}</option>
                  @endforeach
                </select>
              </div>--}}
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-xs-6 col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Datos de Alimentación</div>
        <div class="panel-body">
          <div class="form-group">
            {{-- <select class="form-control select2" style="width: 100%;" name="hotel">
              <option>-Seleccione el Restaurante-</option>
              @foreach ($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->nombre }}</option>
              @endforeach
            </select> --}}
          </div> 
        </div>
      </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">Actividades</div>
    <div class="panel-body">
      <div class="form-group">
        
      </div> 
      {{-- <div class="panel panel-primary">
        <div class="panel-heading">Habitacion</div>
          <div class="panel-body">
            <div class="form-group">
              
            </div>  
          </div>
      </div> --}}
    </div>
</div>
 