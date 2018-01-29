{{-- ARREGLAR DE AQUI PARA ABAJO --}}
<div class="panel panel-primary">
    <div class="panel-heading">
        Alojamiento
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::open(['url'=>'locali', 'method'=>'POST','name'=>'formulario3']) !!}
                <select class="form-control select2" style="width: 100%;" name="localidad" onchange="enviar3(this.value)">
                    <option>--Localidad--</option>
                    @foreach ($localities as $localitie)
                        @if(isset($_POST['localidad']))
                            @if($idloca==$localitie->id)
                                <option selected="true" value="{{ $localitie->id }}"> {{ $localitie->localitie }} </option>
                            @else
                                <option  value="{{ $localitie->id }}"> {{ $localitie->localitie }} </option>
                            @endif
                        @else
                                <option  value="{{ $localitie->id }}"> {{ $localitie->localitie }} </option>
                        @endif
                    @endforeach
                </select>
            {!! Form::close() !!}
        </div>
        <!-- Aqui comprobamos a traves del isset si se envio o no una referencia para mostrare el select-->
        @if(isset($_POST['localidad']))
        <div class="form-group">
            {{-- GUSTAVO, cambie URL hoteles a hotels_test --}}
            {!! Form::open(['url'=>'hotels_test', 'method'=>'POST','name'=>'formulario1']) !!}
                @if(isset($_POST['localidad']))
                    <input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>
                @endif
                    <select style="width: 90%;" multiple="true" name="hotel[]" data-placeholder="Selecciona los hoteles que desees">       
                        @foreach ($hotels as $hotel)
                            <option  value="{{ $hotel->id }}">{{ $hotel->ho_name }} </option>
                        @endforeach
                    </select>
                <br><br>
            {!! Form::submit('Buscar', ['class'=>'btn btn-primary btn-lg']) !!}
            {!! Form::close() !!}
        </div>
        @endif
     </div>
</div>


@if(isset($_POST['hotel']))
    <div class="panel box box-success">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAlojamiento">
                    Hoteles
                    <input type="text" readonly id="txtValor"  name="hoteles" value="0" div style="border:none;background-color:transparent;font-size:30px;" />
                </a>
            </h4>

        </div>
        <div id="collapseAlojamiento" class="panel-collapse collapse">
            <div class="box-body">
                <div style=margin-left:2%;>
                    {{-- URL cambiada de "noches" a quotationC.store --}}
                    {!! Form::open(['route'=>'quotationC.store', 'method'=>'POST','name'=>'formulario2']) !!}
                    @if(isset($localidad))
                        <input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>
                    @endif
                    @if(isset($hotel))
                        <input type='hidden' name='hotel' value=''  onchange="enviar2(this.value)"/>
                    @endif

                    <!--Aqui es donde trabajaras -->

                    <h3>Hoteles seleccionados</h3>

                    @foreach ($seleccionados as $hotel_select)

                        <div class="well">

                            <h4><strong>{{$hotel_select->ho_name}}</strong></h4>

                            <label>Habitaciones</label><br>

                            @foreach ($hotels2 as $hotel_room )

                                @if($hotel_select->ho_name==$hotel_room->hotel_name)

                                    <input type="checkbox" id="room_hotel_{{ $hotel_room->hotel_id }}" name="room_hotel_hotel_{{ $hotel_room->hotel_id }}[]" value="{{ $hotel_room->hotel_room_id }}" />
                                    {{ $hotel_room->room }} / <strong> Precio </strong>: {{  $hotel_room->cost }}&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" id="habitaciones" name="cant_hab_hotel_{{ $hotel_room->hotel_id }}_comb_{{ $hotel_room->hotel_room_id }}" placeholder="Nro de Habitaciones"/>
                                    <br>

                                @endif

                            @endforeach

                            <input type="hidden" value="{{ $hotel_select->id }}" name="hoteles[]"  />

                            <br>
                            {!! Form::label('Cant de Noches ') !!}

                            <input type="number" id="neto" class="form-control" style="width:20%;" name="noches_hotel_{{ $hotel_select->id }}[]" value="0"/>

                            <br>
                            <!--Hasta aqui alli es donde esta todo  el archivo  que conecta esta esta en la ruta public/js/ajax.js -->
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="well">
                                        <label>AQUI VA EL SUBTOTAL DE CALCULO POR HOTEL</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="well">
                                <LABEL>AQUI VA EL RESULTADO DE LA SUMA DE LOS SUBTOTALES</LABEL>
                            </div>
                        </div>
                    </div>
                    
                    <br>

                    <input type="submit">
                    
                    {!! Form::close() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
@section('js')

    <script>



    </script>

@stop()
