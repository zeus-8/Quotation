

@if(isset($_POST['nada']))


<div class="panel panel-primary">
  <div class="panel-heading">Alojamientooo</div>
  <div class="panel-body">
  



{!! Form::open(['route'=>'quotationC.store', 'method'=>'POST','name'=>'formulario1']) !!}
     
    <div class="form-group">
      <select class="form-control select2" style="width: 100%;" name="hotel" onchange="enviar(this.value)">
        <option>--Hotel--</option>
        @foreach ($hotels as $hotel)
          <option value="{{ $hotel->id }}" >{{ $hotel->ho_name }} </option>
        @endforeach
      </select>



    </div>
        {!! Form::close() !!}







@if(isset($_POST['hotel']))
    <div class="panel panel-primary">
      <div class="panel-heading">Habitaciones</div>
      <div class="panel-body">
        <div class="well">res de habitaciones para hoteles
<br>

    @foreach ($hoteles as $hot)

{{ $hot->ho_name }}

    @endforeach

        </div>
        <div class="form-group col-md-3">
          {!! Form::label('Cant de Noches ') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Cnt de noches','name'=>'nombre','id'=>'neto','onkeyup'=>'calcular()']) !!}
        <input type="hidden" id="iva" value="1" onkeyup="calcular()" />


        </div>
      </div>
    </div>
  </div>
</div>








<div class="panel panel-primary">
  <div class="panel-heading">Alimentacion</div>
  <div class="panel-body">
    <div class="form-group col-md-4">




      {!! Form::label('Desayuno') !!}
      {!! Form::text('desayuno', null, ['class'=>'form-control','value'=>'hola','id'=>'total' ,'disabled'=>'disabled','style'=>'width: 100%; background-color:transparent;border:none;']) !!}
    

    </div>
    <div class="form-group col-md-4">
      {!! Form::label('Almuerzo') !!}
     {!! Form::text('desayuno', null, ['class'=>'form-control','value'=>'hola','id'=>'total2' ,'disabled'=>'disabled','style'=>'width: 100%; background-color:transparent;border:none;']) !!}
     </div>
    <div class="form-group col-md-4">
      {!! Form::label('Cena') !!}
    {!! Form::text('desayuno', null, ['class'=>'form-control','value'=>'hola','id'=>'total3' ,'disabled'=>'disabled','style'=>'width: 100%; background-color:transparent;border:none;']) !!}
     </div>
  </div>  
</div>


{!! Form::open(['url'=>'prueba', 'method'=>'POST','name'=>'formulario2']) !!}
       <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

<div class="panel panel-primary">
  <div class="panel-heading">Referencia</div>
  <div class="panel-body">
    <select class="form-control select2" style="width: 100%;" name="referencia"  onchange="enviar2(this.value)">
        <option>--Referencia--</option>
        @foreach ($references as $ref)
          <option value="{{ $ref->id }}"  {{-- @if ($ref->id == $hotel->id)
                                            SELECTED
                                          @endif --}}>{{ $ref->reference }} </option>
        @endforeach

         @endif







@if(isset($_POST['hotel'])) @foreach ($hoteles as $hot) <input type="hidden" name="hotel" value="{{ $hot->id }}" /> @endforeach @endif

      </select>
  </div>
</div>

  {!! Form::close() !!}




@if(isset($_POST['referencia']))

<div class="panel panel-primary">
  <div class="panel-heading">Guias</div>
  <div class="panel-body">
    <div class="form-group">
      <select class="form-control select2" style="width: 100%;" name="lo_gui">
        <option>--Localidad--</option>
       @foreach ($localidad as $local)

          <option value="{{ $local->id }}"> {{ $local->localitie }} </option>
        @endforeach 
      </select>
    </div>
   

    <div class="well">
      @foreach ($guides as $guide)
        <div class="checkbox">
          <label><input type="checkbox" name="guides[]" value="{{ $guide->id }}"> {{ $guide->gu_name }}</label>
        </div>
      @endforeach
    </div>


  

            
  </div>
</div>



@endif