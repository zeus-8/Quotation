<div class="box-group" id="accordion">
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Datos del Cliente
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="box-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Nombre') !!}
                                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Apellido') !!}
                                {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Apellido']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Celular') !!}
                                {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Celular']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Fijo') !!}
                                {!! Form::text('fijo', null, ['class'=>'form-control', 'placeholder'=>'Fijo']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Email') !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('Direccion') !!}
                                {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
                                <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
        

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
            {!! Form::open(['url'=>'hoteles', 'method'=>'POST','name'=>'formulario1']) !!}     
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
                    {!! Form::open(['url'=>'noches', 'method'=>'POST','name'=>'formulario2']) !!}
                        @if(isset($_POST['localidad']))
                            <input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>
                        @endif
                        @if(isset($_POST['hotel']))
                            <input type='hidden' name='hotel' value=''  onchange="enviar2(this.value)"/>
                        @endif
  <!--Aqui es donde trabajaras -->                      
                        <h3>Hoteles seleccionados</h3>
                        @foreach ($seleccionados as $s) 
                            <div class="well">
                                <h4><b>{{$s->ho_name}}</b></h4>
                                <label>Habitaciones</label><br>
                                @foreach ($hotels2 as $ho2 )
                                    @if($s->ho_name==$ho2->ho_name)
                                            <input type="checkbox" id="chk_1" name='opcion[]' value="{{  $ho2->cost }}"  onclick="calcular(this.checked, this.value);" />                          
                                            {{  $ho2->room }} / <b> Precio </b>: {{  $ho2->cost }}&nbsp;&nbsp;&nbsp;&nbsp;                            
                                            <input type="text" id="habitaciones" placeholder="Cnt.Habitaciones.." value=""/>
                                            <br>
                                    @endif
                                @endforeach
                                <input type="hidden"  value="{{ $s->id }}"  name="hoteles[]"  /> 
                                <br>
                                {!! Form::label('Cant de Noches ') !!}
                                <input type="number" id="neto" class="form-control" div style=width:20%; name="noches[]" value="0" placeholder="cant.. noches"  /> 
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
                        {!! Form::close() !!}
                         <!-- /.Este form no va a ir alli no te preocupes ese es el que envia la info al store si tu quieres lo quitas y pones fuera del form aunque no enviaran los js el final de este form esta al final -->
                        {!! Form::open(['route'=>'quotationC.store', 'method'=>'POST','name'=>'formulario2']) !!}    
                </div>
    @endif
  </div>
  </div>
</div>

            <!-- /.box-header -->
         
          




<!--Panel de alimentacion-->
<!--Este isset termina al final-->
@if(isset($_POST['hotel']))
<div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Alimentacion      
                    <input type="text"  id="totalali"  name="subiva2" value="0"  div style="border:none;background-color:transparent;font-size:30px;" />
               
                      </a>
                    </h4>                   
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                  
                 

  <div class="panel-body">
    <div class="form-group col-md-4">
      {!! Form::label('Cant. Dias') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia1','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Cant. Dias') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia2','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Cant. Dias') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia3','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Costo Desayuno') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control', 'placeholder'=>'Desayuno','id'=>'ali1','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Costo Almuerzo') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control', 'placeholder'=>'Almuerzo','id'=>'ali2','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Costo Cena') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control', 'placeholder'=>'Cena','id'=>'ali3','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Total desayuno') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control','name'=>'ali1', 'placeholder'=>'Desayuno','id'=>'sub1','disabled','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Total almuerzo') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control','name'=>'ali2', 'placeholder'=>'Almuerzo','id'=>'sub2','disabled','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Total cena') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control','name'=>'ali3', 'placeholder'=>'Cena','id'=>'sub3','disabled','onkeyup'=>'alimento()']) !!}
    </div>
  </div>
 </div>
</div>
</div>  

<!-- guias-->
                    <div class="panel box box-success">
                              <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree2">
                                        Guias 
                                        <input type="text"  id="subiva"  name="subiva2" value="0"  div style="border:none;background-color:transparent;font-size:30px;" />                                     
                                        </a>
                                    </h4>
                              </div>
                              <div id="collapseThree2" class="panel-collapse collapse">
                                    <div class="box-body">                  
                                        <div class="well">
                                            <h4>
                                                 Guias en 
                                                  @foreach ($localidad3 as $loca3) 
                                                  {{ $loca3->localitie }} 
                                                  @endforeach
                                            </h4>
                                            @foreach ($referencia as $rf)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="chk_2"  name="guides[]" value="{{ $rf->cost }}" onclick="calculo2(this.checked, this.value);">
                                                    {{ $rf->gu_name }} 
                                                    <b> Costo </b> : {{ $rf->cost }} $ IVA  <label>{{ $rf->cost*0.12 }}</label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" id="chk_1" name='opcion' value="{{ $rf->cost*0.12 }}"  onclick="calcu(this.checked, this.value);" />
                                                   <br>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                    <!--impuestos y subtotales de los guias-->
                                        <div align="right">
                                            <div class="well" div style=width:20%;>
                                                    <span div style=float:left;>
                                                        Impuesto
                                                    </span>
                                                    <input type="text" readonly id="iva"  name="iva" value="0" div style="border:none;background-color:transparent;font-size:30px;" />
                                                    <span div style=float:left;>
                                                        Sub-Total
                                                    </span>
                                                        <input type="text" readonly id="txtValor3"  name="subiva" value="0" div style="border:none;background-color:transparent;font-size:30px;" />           
                                            </div>
                                        </div>
                                    </div>
                              </div>
                    </div>
<!--Tranfers-->
                    <div class="panel box box-success">
                                      <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3">
                                                    Tranfers                   
                                                    <input type="text" readonly id="txtValor2"  name="tranfers" value="0" div style="border:none;background-color:transparent;font-size:30px;" />                                       
                                                </a>
                                            </h4>
                                    </div>
                            <div id="collapseThree3" class="panel-collapse collapse">
                                <div class="box-body">                  
                                    <div class="well">
                                            <h4>
                                                Transfers  encontrados en 
                                                @foreach ($localidad3 as $loca3) 
                                                {{ $loca3->localitie }} 
                                                @endforeach
                                            </h4>
                                            <label>Tipo de Servicio</label><br>
                                            @foreach ($referencia2 as $rf2)
                                                    <input type="checkbox" id="chk_1" name='opcion1' value="{{ $rf2->tr_cost }}" onclick="calculo(this.checked, this.value);" />
                                                    {{ $rf2->tr_name }}
                                                    - 
                                                    <b> Costo: </b>$ {{ $rf2->tr_cost }} 
                                                    <br>
                                            @endforeach
                                     </div>
                                </div>
                            </div>
                     </div>
                     <div class="panel box box-success">
                                      <div class="box-header with-border">
                                        <h4 class="box-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree4">
                                         Ticket aereo
                                          <input type="text" readonly  id="subtotal7" name="ticket" value="0"  div style="border:none;background-color:transparent;font-size:30px;"/>
                            
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="collapseThree4" class="panel-collapse collapse">
                                        <div class="box-body">
                                      
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Ticket Adulto') !!}
                                                      {!! Form::text('neto', 0, ['class'=>'form-control','placeholder'=>'Ticket Adulto','name'=>'tadulto','id'=>'pasaje1','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Impuesto ',0,['id'=>'labe']) !!}
                                                      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','id'=>'impuesto1','onkeyup'=>'calcula()']) !!}
                                                      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal1','onkeyup'=>'calcula()']) !!}
                                                     </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Ticket Niño') !!}
                                                      {!! Form::text('ticket_nino', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Niño','id'=>'pasaje2','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Impuesto',0,['id'=>'labe']) !!}
                                                      {!! Form::text('impuesto_nino', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Niño','id'=>'impuesto2','onkeyup'=>'calcula()']) !!}
                                                      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal2','onkeyup'=>'calcula()']) !!}                               
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Ticket Tercera Edad') !!}
                                                      {!! Form::text('ticket_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Tercera Edad','id'=>'pasaje3','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Impuesto ',0,['id'=>'labe']) !!}
                                                      {!! Form::text('impuesto_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Tercera Edad','id'=>'impuesto3','onkeyup'=>'calcula()']) !!}
                                                      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal3','onkeyup'=>'calcula()']) !!}                              
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Ticket Extranjero') !!}
                                                      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje4','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Impuesto ',0,['id'=>'labe']) !!}
                                                      {!! Form::text('impuesto_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Extranjero','id'=>'impuesto4','onkeyup'=>'calcula()']) !!}
                                                      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal4','onkeyup'=>'calcula()']) !!}                             
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Ticket Niño Extranjero') !!}
                                                      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje5','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      {!! Form::label('Impuesto ',0,['id'=>'labe']) !!}
                                                      {!! Form::text('impuesto_noño_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Extranjero','id'=>'impuesto5','onkeyup'=>'calcula()']) !!}
                                                       {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal5','onkeyup'=>'calcula()']) !!}
                                                    </div>
                                        </div>
                                        <div class="form-group col-md-4"> 
                                             <div class="well">
                                                        <LABEL>                                                
                                                                <div class="form-group col-md-12">
                                                                        {!! Form::label('Subtotal 3') !!}
                                                                         <input type="hidden" id="total4" value="0" disabled="true" div style="border:none;background-color:transparent;"  /> 
                                                                         <input type="hidden" id="total5"  value="0"  disabled="true" div style="border:none;background-color:transparent;"   />
                                                                        <input type="text" id="subtotal6"  value="0" name="subtotal6" disabled="true" div style="border:none;background-color:transparent;"   />
                                                                 </div>
                                                                 <div class="form-group col-md-12">
                                                                        {!! Form::label('Iva ') !!}
                                                                        <input type="text" id="tiva"  value="0" name="subtotal6" disabled="true" div style="border:none;background-color:transparent;"   />
                                                                 </div>
                                                                  <div class="form-group col-md-12">
                                                                        {!! Form::label('Total con Iva ') !!}
                                                                        <input type="text" id="totalconiva"  value="0" name="subtotal6" disabled="true" div style="border:none;background-color:transparent;" />
                                                                 </div>
                                                        </LABEL>  
                                             </div>
                                        </div> 
                                    </div>
                     </div>
                    </div>
                    <div class="panel box box-success">
                            <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree5">
                                            Calculo por persona
                                            <input type="text" name="sub2" id="subtotal" value="0"  disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>                       
                                        </a>
                                    </h4>
                            </div>
                            <div id="collapseThree5" class="panel-collapse collapse">
                                    <div class="box-body">
                                          <div class="form-group col-md-3">
                                                {!! Form::label('Adulto(s)') !!}
                                                {!! Form::text('adulto', 0, ['class'=>'form-control', 'placeholder'=>'Adulto','id'=>'persona1','onkeyup'=>'persona()']) !!}
                                          </div>
                                          <div class="form-group col-md-3">
                                                {!! Form::label('Niño(s)') !!}
                                                {!! Form::text('nino', 0, ['class'=>'form-control', 'placeholder'=>'Niño','id'=>'persona2','onkeyup'=>'persona()']) !!}
                                          </div>
                                          <div class="form-group col-md-3">
                                                {!! Form::label('Tercera Edad') !!}
                                                {!! Form::text('adulto_mayor', 0, ['class'=>'form-control', 'placeholder'=>'Tercera Edad','id'=>'persona3','onkeyup'=>'persona()']) !!}
                                          </div>
                                          <div class="form-group col-md-3">
                                                {!! Form::label('Extranjero(s)') !!}
                                                {!! Form::text('extranjero',0, ['class'=>'form-control', 'placeholder'=>'Extranjero','id'=>'persona4','onkeyup'=>'persona()']) !!}
                                          </div>
                                          <div class="form-group">
                                                {!! Form::label('Descrion') !!}
                                                {!! Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion']) !!}
                                          </div>
                                    </div>
                                    <div align="right">
                                        <div class="well" div style=width:20%;margin-right:2%;>
                                            <input type="text" name="sub7" id="sub7" value="0"  disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
                                        </div>
                                    </div>
                                    <div align="right">
                                            <div style=width:25%;>
                                                {!! Form::label('Agregar porcentaje') !!}
                                                {!! Form::text('',0, ['class'=>'form-control', 'placeholder'=>'Extranjero','id'=>'si','onkeyup'=>'para()']) !!}
                                            </div>
                                            <b> 
                                                Total con porcentaje
                                            </b>
                                            <div class="well" div style=width:20%;margin-right:2%;>
                                                <input type="text" readonly  name="totalpor" id="sub8" value="0"   div style="border:none;background-color:transparent;font-size:30px;"/>
                                            </div>
                                    </div>   
                                    <div class="form-group">
                                            <input type="hidden" readonly  name="por" id="sub9" value="0"   />
                                    </div>
                            </div>
                    </div>
                    {!! Form::submit('Buscar', ['class'=>'btn btn-primary btn-lg']) !!}
                        <a href="{{ URL::to('quotation') }}" class="btn btn-danger btn-lg">
                            Cancelar
                        </a>
  
                    {!! Form::close() !!}
@endif
