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
{{-- <div class="row">
  <div class="col-xs-6 col-sm-6"> --}}
    <div class="panel panel-primary">
      <div class="panel-heading">Datos del Paquete</div>
        <div class="panel-body">
          <div class="form-group">
            <h1>{{ $package->pa_name }}</h1>
            {{-- <select class="form-control select2" style="width: 100%;" name="hotel">
              <option>-Seleccione el Paquete-</option>
              @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->pa_name }}</option>
              @endforeach 
            </select>--}}
            <div class="panel-body">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>calculo</h3>
                  <p>Por Adulto</p>
                </div>
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div> 
            </div>


            
            <div class="row">
            <div class="form-group has-feedback col-md-4">
              {!! Form::label('Adultos') !!}
              {!! Form::text('cantidad_adulto', 1, ['class'=>'form-control', 'placeholder'=>'Cantidad de Adultos']) !!}
            </div>
            <div class="form-group has-feedback col-md-4">
              {!! Form::label('Niños') !!}
              {!! Form::text('cantidad_niño ', null, ['class'=>'form-control', 'placeholder'=>'Cantidad de Niños']) !!}
            </div>
            <div class="form-group has-feedback col-md-4">
              {!! Form::label('Adulto Mayor') !!}
              {!! Form::text('cantidad_adulto_mayor', null, ['class'=>'form-control', 'placeholder'=>'Cantidad de Adulto Mayor']) !!}
            </div>
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
              <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Actividades <i class="fa fa-chevron-down"></i>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="well">
                        {{ $package->pa_activities }}<br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
    </div>
  {{-- </div>
  <div class="col-xs-6 col-sm-6"> --}}
      <div class="panel panel-primary">
        <div class="panel-heading">Costos</div>
          <div class="row">
            <div class="panel-body col-sm-4">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $package->pa_cost_a }}</h3>
                  <p>Por Adulto</p>
                </div>
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div> 
            </div>
          
            <div class="panel-body col-sm-4">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $package->pa_cost_n }}</h3>
                  <p>Por Niño</p>
                </div>
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div> 
            </div>

            <div class="panel-body col-sm-4">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $package->pa_cost_te }}</h3>
                  <p>Por Adulto Mayor</p>
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
 {{--  </div>
</div> --}}
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-primary">
      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseAlojamiento">Datos de Alojamiento <i class="fa fa-chevron-down"></i></div>
      <div class="panel-body panel-collapse collapse" id="collapseAlojamiento">
        <div class="form-group">
           <select class="form-control select2" style="width: 100%;" name="hotel">
            <option>--Seleccione Hotel--</option>
            @foreach ($hotels as $res)
              <option value="{{ $res->id }}" {{-- @if ($res->id == $hotel->id)
                                              SELECTED
                                            @endif--}}>{{ $res->ho_name }} </option>
            @endforeach
          </select>
        </div>
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
  <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseAlimentacion">Datos de Alimentación <i class="fa fa-chevron-down"></i></div>
        <div class="panel-body panel-collapse collapse" id="collapseAlimentacion">
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
