<div class="row">



  <div class="col-sm-12">
<div class="panel panel-primary">
  <div class="panel-heading">Servicios</div>
  <div class="panel-body">
    <div class="well">

  {!! Form::open(['url'=>'localidadpa', 'method'=>'POST','name'=>'formulario5']) !!}



      <select class="form-control select2" style="width: 100%;" name="local"  onchange="envio1(this.value)">
        <option>-Seleccione la Localidad-</option>
        @foreach ($localities as $loca)
          @if(@isset($_POST['local']))
            @if($local==$loca->id)
               <option value="{{ $loca->id }}" selected="true">{{ $loca->localitie}}</option> 
            @else       
               <option value="{{ $loca->id }}" >{{ $loca->localitie}}</option> 
            @endif     
          @else
               <option value="{{ $loca->id }}" >{{ $loca->localitie}}</option> 
          @endisset
        @endforeach
      </select>

<br><br>

    {!! Form::close() !!}

  
    <br>



  

@if(@isset($_POST['local']))
     @if(@isset($_POST['hotel']))

  @foreach ($nombrelocal as $nom_lo)
<h3> Localidad {{ $nom_lo->localitie }} </h3>
  @endforeach
    <div class="panel panel-primary">

        <div class="panel-heading">Datos de los Guias</div>
        <div class="panel-body">
          <div class="well">



      @foreach ($referencias2 as $refe2)

   
<b> Nombre : </b> {{  $refe2->gu_name}} - <b> Costo: </b> {{  $refe2->cost}} $
<input type="checkbox" id="chk_1"  class="minimal"  value="{{  $refe2->cost}} " onclick="actualizarValor(this.checked, this.value);" /> 

<br>

      @endforeach


<div>
 <input type="text" readonly id="txtValor" class="sub1" value="0"  id="sub1"/>
</div>      



          </div>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Datos del Transporte</div>
        <div class="panel-body">
          <div class="well">
        @foreach ($referencias as $refe)
   
<b>Nombre : </b> {{  $refe->tr_name}} - <b> Costo </b> :{{  $refe->tr_cost}} $
<input type="checkbox" id="chk_1" value="{{  $refe->tr_cost}}  " onclick="actualizarValor2(this.checked, this.value);" /> 
<br>


      @endforeach

 <input type="text" readonly id="txtValor2" class="sub1" value="0"  id="sub1"/>

          </div>
</div>

  @endif
</div>
</div>
</div>
</div>
</div>
 @endisset
</div>
</div>
</div>
</div>



  @isset($local)

<div class="row">

<div class="col-sm-6">
  {!! Form::open(['route'=>'packages.store', 'method'=>'POST','name'=>'formulario6']) !!}
  <div class="col-sm-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Datos de Alojamientos</div>
      <div class="panel-body">
<input type="hidden"  name="local" value="{{ $local }}">

        <select class="form-control select2" style="width: 100%;" name="hotel" onchange="envio2(this.value)">
          <option>-Seleccione el Hotel-</option>
          @foreach ($referencias3 as $hotel)
@if(@isset($_POST['hotel']))
  @if($idhotel==$hotel->id)
        <option value="{{ $hotel->id }}" selected="true">{{ $hotel->ho_name }}</option>
  @else       
        <option value="{{ $hotel->id }}">{{ $hotel->ho_name }}</option> 
  @endif     
@else
        <option value="{{ $hotel->id }}">{{ $hotel->ho_name }}</option>
@endisset
          @endforeach
        </select>
   
      @if(@isset($_POST['hotel']))
 @foreach ($nombrehotel as $nomho)
     
 <h3> Seleccionaste : {{ $nomho->ho_name}} </h3> 

 @endforeach
@endisset

@isset($idhotel)

     <div class="well">
  @foreach ($hoteles as $hot)
     
<b> Habitacion </b> : {{ $hot->room }} - <b> Precio : </b> {{ $hot->cost}} $
<input type="checkbox" id="chk_1" value="{{ $hot->cost}} " onclick="actualizarValor3(this.checked, this.value);" /> 
<br>
          @endforeach
 <input type="text" readonly id="txtValor3" class="sub1" value="0"  id="sub1"/>
@endisset

<br><br>



</div>


    {!! Form::close() !!}
        </div>
      </div>


    </div>
      




  </div>


@endisset



@if(@isset($_POST['hotel']))
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
     
  



<h4>Calculo ticket aereo</h4>


   <div class="form-group col-md-6">
      {!! Form::label('Ticket Adulto') !!}
      {!! Form::text('neto', 0, ['class'=>'form-control','placeholder'=>'Ticket Adulto','id'=>'pasaje1','onkeyup'=>'calcula2()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Adulto',0, ['id'=>'labe']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','id'=>'impuesto1','onkeyup'=>'calcula2()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal1','onkeyup'=>'calcula2()']) !!}
     </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Niño') !!}
      {!! Form::text('ticket_nino', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Niño','id'=>'pasaje2','onkeyup'=>'calcula2()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Niño',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_nino', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto','id'=>'impuesto2','onkeyup'=>'calcula2()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal2','onkeyup'=>'calcula2()']) !!}
    
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Tercera Edad') !!}
      {!! Form::text('ticket_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Tercera Edad','id'=>'pasaje3','onkeyup'=>'calcula2()']) !!}
      
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Tercera Edad',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto','id'=>'impuesto3','onkeyup'=>'calcula2()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal3','onkeyup'=>'calcula2()']) !!}
    
   </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Extranjero') !!}
      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje4','onkeyup'=>'calcula2()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Extranjero',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto','id'=>'impuesto4','onkeyup'=>'calcula2()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal4','onkeyup'=>'calcula2()']) !!}
    
   </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Niño Extranjero') !!}
      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje5','onkeyup'=>'calcula2()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Niño Extranjero',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_noño_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto','id'=>'impuesto5','onkeyup'=>'calcula2()']) !!}
       {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal5','onkeyup'=>'calcula2()']) !!}
    
    </div>


   <div class="form-group col-md-6">
{!! Form::label('Subtotal 1') !!}
<input type="text" id="total4" value="0" disabled="true" div style="border:none;background-color:transparent;"  /> 
 
 </div>


 <div class="form-group col-md-3">
{!! Form::label('Subtotal 2') !!}
 <input type="text" id="total5"  value="0"  disabled="true" div style="border:none;background-color:transparent;"   />

 </div>

 <div class="form-group col-md-3">
{!! Form::label('Subtotal 3') !!}
 <input type="text" id="subtotal6"  value="0" name="subtotal6" disabled="true" div style="border:none;background-color:transparent;"   />
 
 </div>
</div>




<div div style=margin-left:6%;>


 <div class="well" div style=width:20%;margin-right:2%;>
<input type="text" name="sub2" id="subtotal7" value="0" disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
</div>




   <button type="button" class="btn  btn-success " onclick="addRow('dataTable');">Agregar fecha</button>

     <INPUT type="button" class="btn  btn-danger " value="Borrar fecha" onclick="deleteRow('dataTable');" />
<br><br>

     <TABLE id="dataTable" width="350px" border="1">
      <th></th>
      <th> Desde</th>
      <th> Hasta </th>
          <TR>
               <TD><INPUT type="checkbox"  NAME="chk"/></TD>
               <TD> <INPUT type="date" class="form-control" name="desde[]" /> </TD>
               <TD> <INPUT type="date"  class="form-control"  name="hasta[]" /> </TD>
          </TR>
     </TABLE>

<br>


 
        
<h3> Total</h3>
   <input type="text" readonly id="txtValor4" class="sub1" value="0"  id="sub1" onkeyup="total()"/>
  <br>
   <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                      <a href="{{ URL::to('packages') }}" class="btn btn-danger">Cancelar</a>
                    </div>
</div>
                


      </div>
    </div>

@endif   







</div>




</div>









