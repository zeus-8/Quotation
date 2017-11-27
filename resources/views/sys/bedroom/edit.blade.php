@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Edicion de Habitacion</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
              <div class="register-box-body">
                <div class="box-header whith-border"><h3 class="box-title">Actualizacion de Datos de Habitacion</h3></div>
                @include('sys.message.request_message')    
                {!! Form::model($bed,['route'=>['bed.update', $bed->id], 'method'=>'PUT']) !!}
                   @include('sys.bedroom.form.bedroom')
                   <div class="form-group">
                    {!! Form::submit('Modificar', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
@stop

