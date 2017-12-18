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
                <option>--Seleccione el Hotel--</option>
                @foreach ($pakages as $pakage)
                  <option value="{{ $pakage->id }}">{{ $pakage->nombre }}</option>
                @endforeach
              </select>
            </div>  
            <div class="form-group has-feedback">
              {!! Form::label('Cantidad') !!}
              {!! Form::text('nombre_paquete', null, ['class'=>'form-control', 'placeholder'=>'Cantidad de Adultos']) !!}
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
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
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
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
            <div class="form-group">
              <select class="form-control select2" style="width: 100%;" name="hotel">
                <option>--Seleccione el Hotel--</option>
                @foreach ($hotels as $hotel)
                  <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
                @endforeach
              </select>
            </div> 
            <div class="panel panel-primary">
              <div class="panel-heading">Habitacion</div>
                <div class="panel-body">
                  <div class="form-group">
                    
                  </div>  
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
              <select class="form-control select2" style="width: 100%;" name="hotel">
                <option>--Seleccione el Hotel--</option>
                @foreach ($restaurants as $restaurant)
                  <option value="{{ $restaurant->id }}">{{ $restaurant->nombre }}</option>
                @endforeach
              </select>
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
 