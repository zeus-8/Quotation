<div class="panel panel-primary">
    <div class="panel-heading">Datos del Hotel</div>
        <div class="panel-body">
            <dl>
                <dt>Referencia</dt>
                <dd>
                    <select name="ref" class="form-control select2" style="width: 100%;">
                        <option>--Seleccione--</option>
                        @foreach ($references as $ref)
                            <option value="{{ $ref->id }}" @if ($op == 2)
                                                                @if ($ref->id == $hotel->reference_id)
                                                                SELECTED
                                                                @endif
                                                            @endif>
                                                            {{ $ref->reference }}</option>
                        @endforeach
                    </select>              
                </dd><br>
                <dt>Tipo de Hotel</dt>
                <dd>
                    <select name="tipo_hotel" class="form-control select2" style="width: 100%;">
                        <option>--Seleccione--</option>
                        @foreach ($thotels as $thotel)
                            <option value="{{ $thotel->id }}" @if ($op == 2)
                                                                @if ($thotel->id == $hotel->thotel_id) 
                                                                    SELECTED
                                                                @endif
                                                              @endif>
                                                            {{ $thotel->type_hotel }}</option>
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
                        <option value="{{ $restaurant->id }}" @if ($op == 2)
                                                                    @if ($restaurant->id == $hotel->restaurant_id)
                                                                        SELECTED
                                                                    @endif>
                                                               @endif
                                                                {{ $restaurant->re_name }}</option>
                      @endforeach
                    </select>              
                </dd><br>
            </dl>
            @if ($op == 1)
                        <h4>Habitaciones Disponibles</h4>
                        <div class="well">
                            @foreach ($rooms as $room)
                                <dl>
                                    <dt>{{ $room->room }}</dt>
                                    <dd>
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Costo" name="room[{{ $room->id }}]" value="0">
                                            <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        </div>
                                    </dd>
                                </dl>  
                            @endforeach
                        </div>  
                   @elseif ($op == 2)
                        <h4>Habitaciones Seleccionadas</h4>
                        <div class="well">
                            @foreach ($roomf as $room)
                                <dl>
                                  <dt>{{ $room->room }}</dt>
                                  <dd>
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Costo" name="room[{{ $room->id }}]" value="{{--@php if ($op == 1){
                                                                                                                                            echo $r=0; 
                                                                                                                                          }
                                                                                                                                          elseif ($op == 2)
                                                                                                                                          {
                                                                                                                                            foreach ($roomf as $ro){
                                                                                                                                                if ($room->id == $ro->room_id){
                                                                                                                                                    echo $ro->cost;
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            
                                                                                                                                          }
                                                                                                                                        @endphp--}}{{ $room->cost }}">
                                      
                                      <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                    </div>
                                  </dd>
                                </dl>
                            @endforeach
                        </div>
                    @endif
                        {{-- <br>
                        <h4>Habitaciones para Agregar</h4>
                        <div class="well">
                            @foreach ($rooms as $room_new)
                               @if ($room_new->id == $room->id)
                                    <dl>
                                      <dt>{{ $room_new->room }}</dt>
                                      <dd>
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Costo" name="room[{{ $room_new->id }}]" value="0">
                                            <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        </div>
                                      </dd>
                                    </dl>
                                @endif 
                            @endforeach
                        </div> 
                    @endif--}}
        </div>
</div>

  


  


