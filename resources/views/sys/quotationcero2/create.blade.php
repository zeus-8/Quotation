@extends('adminlte::page')

@section('title', 'Cotizacioness')

@section('content_header')
    <h1>Nueva Cotización</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-xs-6 col-sm-6">
                    <h6 class="box-title">Esta cotización la realizara: {{ $user->name }}, {{ $user->us_last_name }}</h6>
                  </div>  
                  <div  class="col-xs-6 col-sm-6">
                    <label>Fecha: {{ $carbon }}</label>
                    <h5></h5>
                  </div>
                </div>
              </div>
              <div class="box-body">






<div>

<div class="panel panel-primary">
  <div class="panel-heading">Alojamient</div>
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





@if(isset($_POST['localidad']))

    <div class="form-group">
      {!! Form::open(['url'=>'prueba', 'method'=>'POST','name'=>'formulario2']) !!}
    
@if(isset($_POST['localidad']))<input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>@endif

      <select class="form-control select2" style="width: 100%;" name="referencia" onchange="enviar2(this.value)">
        <option>--Referenciaaa--</option>
      @foreach ($localidad as $local)

@if(isset($_POST['referencia']))
  @if($refe==$local->id)
      <option selected="true" value="{{ $local->id }}">{{ $local->reference }} </option>
  @else
      <option value="{{ $local->id }}">{{ $local->reference }} </option>
  @endif
@else
      <option value="{{ $local->id }}">{{ $local->reference }} </option>
@endif

        @endforeach
      </select>
           {!! Form::close() !!}
    </div>
   
@endif


@if(isset($_POST['referencia']))

    <div class="form-group">
        {!! Form::open(['route'=>'quotationC.store', 'method'=>'POST','name'=>'formulario1']) !!}
      
@if(isset($_POST['referencia']))<input type='hidden' name='referencia'  value='{{ $refe }}' onchange="enviar2(this.value)"/>@endif
@if(isset($_POST['localidad']))<input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>@endif
  <select class="chosen-select"  style="width: 90%;" multiple="true" name="hotel[]" data-placeholder="Selecciona los hoteles que desees">
        
        @foreach ($hotels as $hotel)



<option  value="{{ $hotel->id }}">{{ $hotel->ho_name }} </option>

        @endforeach
      </select>

<br><br>
{!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}

        {!! Form::close() !!}
    </div>


@endif

  </div>
</div>








    <div class="panel panel-primary">
         @if(isset($_POST['hotel']))
      <div class="panel-heading">Habitaciones</div>
 

<div style=margin-left:2%;>
   {!! Form::open(['url'=>'noches', 'method'=>'POST','name'=>'formulario2']) !!}

@if(isset($_POST['referencia']))<input type='hidden' name='referencia'  value='{{ $refe }}' onchange="enviar2(this.value)"/>@endif
@if(isset($_POST['localidad']))<input type='hidden' name='localidad' value='{{ $idloca }}'  onchange="enviar2(this.value)"/>@endif
@if(isset($_POST['hotel']))<input type='hidden' name='hotel' value=''  onchange="enviar2(this.value)"/>@endif

<h3> Hoteles seleccionados </h3>
@foreach ($seleccionados as $s) 

 <h4> {{$s->ho_name}} </h4>


 @foreach ($hotels2 as $ho2 )

    @if($s->ho_name==$ho2->ho_name)

 <b> Habitacionn : </b> {{  $ho2->room }} / <b> Precio </b> :{{  $ho2->cost }}
     
<input type="checkbox" id="chk_1" name='opcion[]' value="{{  $ho2->cost }}"  onclick="calcular(this.checked, this.value);" />  

       
       <br>
    @else


    @endif

 @endforeach


 <input type="hidden"  value="{{ $s->id }}"  name="hoteles[]"  /> 

<br>

      {!! Form::label('Cant de Noches ') !!}



<input type="number" id="neto" class="form-control" div style=width:20%; name="noches[]" value="0" placeholder="cant.. noches"  /> 

<br>

@endforeach
<br>

  
<input type="submit" value="Calcular" class="btn btn-success btn-sm" div style=margin:2%;margin-left:5.5%;/>






     {!! Form::close() !!}

  <div align="right">
 <div class="well" div style=width:20%;>

<input type="text" readonly id="txtValor"  name="uno" value="0" div style="border:none;background-color:transparent;font-size:30px;" />

</div>
</div>



</div>

@endif
 

@if(isset($_POST['noches']))


      <div class="panel-body">

  

@endif


      </div>

    </div>
@if(isset($_POST['noches']))

<div class="panel panel-primary">
  <div class="panel-heading">Alimentacioon</div>
  <div class="panel-body">
    <div class="form-group col-md-4">
      {!! Form::label('Dias') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia1','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Dias') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia2','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Dias') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control', 'placeholder'=>'Dias','id'=>'dia3','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Desayuno') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control', 'placeholder'=>'Desayuno','id'=>'ali1','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Almuerzo') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control', 'placeholder'=>'Almuerzo','id'=>'ali2','onkeyup'=>'alimento()']) !!}
    </div>


    <div class="form-group col-md-4">
      {!! Form::label('Cena') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control', 'placeholder'=>'Cena','id'=>'ali3','onkeyup'=>'alimento()']) !!}
    </div>



    <div class="form-group col-md-4">
      {!! Form::label('subtotal 1') !!}
      {!! Form::text('desayuno', 0, ['class'=>'form-control', 'placeholder'=>'Desayuno','id'=>'sub1','disabled','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('subtotal 2') !!}
      {!! Form::text('almuerzo', 0, ['class'=>'form-control', 'placeholder'=>'Almuerzo','id'=>'sub2','disabled','onkeyup'=>'alimento()']) !!}
    </div>
    <div class="form-group col-md-4">
      {!! Form::label('subtotal 3') !!}
      {!! Form::text('cena', 0, ['class'=>'form-control', 'placeholder'=>'Cena','id'=>'sub3','disabled','onkeyup'=>'alimento()']) !!}
    </div>

  </div>

<div align="right">
 <div class="well" div style=width:20%;margin-right:2%;>
<input type="text" name="sub2" id="totalali" value="0" onkeyup="alimento()" disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
</div>
</div>



</div>





<div class="panel panel-primary">
  <div class="panel-heading">Guias</div>
  <div class="panel-body">
  
    <div class="well">
        <h4>Guias en esta area</h4>
      @foreach ($referencia as $rf)
        <div class="checkbox">



          <label><input type="checkbox" id="chk_2"  name="guides[]" value="{{ $rf->cost }}" onclick="calculo2(this.checked, this.value);">
           {{ $rf->gu_name }} 
 - 
<b> Costo </b> : {{ $rf->cost }} $ IVA 
      <input type="radio" id="chk_1" name='opcion' value="{{ $rf->cost*0.12 }}"  onclick="calcu(this.checked, this.value);" /> <br>

         </label>
        </div>
      @endforeach
    </div>



<div align="right">
 <div class="well" div style=width:20%;>

 <span div style=float:left;> Impuesto</span>
<input type="text" readonly id="iva"  name="dos" value="0" div style="border:none;background-color:transparent;font-size:30px;" />
 
 <span div style=float:left;> Sub-Total</span>
<input type="text" readonly id="txtValor3"  name="dos" value="0" div style="border:none;background-color:transparent;font-size:30px;" />
<span div style=float:left;> Total</span>
<input type="text"  id="subiva"  name="dos" value="0"  div style="border:none;background-color:transparent;font-size:30px;" />

</div>



</div>


  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">Transfers</div>
  <div class="panel-body">
      <div class="well">

        <h4>Transfers  encontrados en @foreach ($localidad2 as $loca2) {{ $loca2->reference }} @endforeach</h4>

@foreach ($referencia as $rf)
 <input type="checkbox" id="chk_1" name='opcion1' value="{{ $rf->tr_cost }}" onclick="calculo(this.checked, this.value);" />     
<b> Nombre : </b>{{ $rf->tr_name }}
 - 
<b> Costo : </b>{{ $rf->tr_cost }} $


<br>

      @endforeach

      </div>

<div align="right">
 <div class="well" div style=width:20%;>

<input type="text" readonly id="txtValor2"  name="dos" value="0" div style="border:none;background-color:transparent;font-size:30px;" />

</div>

</div>
  </div>
</div>





<div class="panel panel-primary">
  <div class="panel-heading">Ticket Aereo</div>
  <div class="panel-body">
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Adulto',0, ['id'=>'labe']) !!}
      {!! Form::text('neto', 0, ['class'=>'form-control','placeholder'=>'Ticket Adulto','id'=>'pasaje1','onkeyup'=>'calcula()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Adulto',0, ['id'=>'labe']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','id'=>'impuesto1','onkeyup'=>'calcula()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal1','onkeyup'=>'calcula()']) !!}
     </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Niño',0, ['id'=>'labe']) !!}
      {!! Form::text('ticket_nino', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Niño','id'=>'pasaje2','onkeyup'=>'calcula()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Niño',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_nino', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Niño','id'=>'impuesto2','onkeyup'=>'calcula()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal2','onkeyup'=>'calcula()']) !!}
    
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Tercera Edad') !!}
      {!! Form::text('ticket_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Tercera Edad','id'=>'pasaje3','onkeyup'=>'calcula()']) !!}
      
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Tercera Edad',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_tercera_edad', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Tercera Edad','id'=>'impuesto3','onkeyup'=>'calcula()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal3','onkeyup'=>'calcula()']) !!}
    
   </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Extranjero') !!}
      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje4','onkeyup'=>'calcula()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Extranjero',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Extranjero','id'=>'impuesto4','onkeyup'=>'calcula()']) !!}
      {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal4','onkeyup'=>'calcula()']) !!}
    
   </div>
    <div class="form-group col-md-6">
      {!! Form::label('Ticket Niño Extranjero') !!}
      {!! Form::text('ticket_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Ticket Extranjero','id'=>'pasaje5','onkeyup'=>'calcula()']) !!}
    </div>
    <div class="form-group col-md-6">
      {!! Form::label('Impuesto Niño Extranjero',0, ['id'=>'labe']) !!}
      {!! Form::text('impuesto_noño_extranjero', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Extranjero','id'=>'impuesto5','onkeyup'=>'calcula()']) !!}
       {!! Form::text('iva', 0, ['class'=>'form-control', 'placeholder'=>'Impuesto Adulto','disabled','id'=>'subtotal5','onkeyup'=>'calcula()']) !!}
    
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

<div align="right">
 <div class="well" div style=width:20%;margin-right:2%;>
<input type="text" name="sub2" id="subtotal7" value="0" disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
</div>
</div>



</div>
<div class="panel panel-primary">
  <div class="panel-heading">Calculo por Persona</div>
  <div class="panel-body">
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
<input type="text" name="sub2" id="subtotal" value="0" onkeyup="persona()" disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
</div>
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
      {!! Form::text('extranjero',0, ['class'=>'form-control', 'placeholder'=>'Porcentaje','id'=>'porcentaje','onkeyup'=>'porcentaje()']) !!}
</div>

<b> Total con porcentaje</b>
 <div class="well" div style=width:20%;margin-right:2%;>
<input type="text" name="su" id="sub8" value="0"  disabled="true" div style="border:none;background-color:transparent;font-size:30px;"/>
</div>
</div>




   <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                      <a href="{{ URL::to('quotation') }}" class="btn btn-danger btn-lg">Cancelar</a>
                    </div>

@endif



          

                @include('sys.message.request_message')
                  
                   <?php $op = 1; ?>
                    
                  
                
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->


@stop





