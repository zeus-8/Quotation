@extends('adminlte::page')

@section('title', 'Restaurant')

@section('content_header')
    <h1>Edicion de Restaurant</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
              <div class="register-box-body">
                <div class="box-header whith-border"><h3 class="box-title">Actualizacion de Datos</h3></div>
                <!-- <p class="login-box-msg">Nuevo Miembro</p> -->
                @include('sys.message.request_message')    
                {!! Form::model($res,['route'=>['restaurant.update', $res->id], 'method'=>'PUT']) !!}
                   @include('sys.restaurant.form.restaurant')
                   <div class="form-group">
                    {!! Form::submit('Modificar', ['class'=>'btn btn-primary btn-lg']) !!}
                    <a href="{{ URL::to('restaurant') }}" class="btn btn-danger btn-lg">Cancelar</a>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
@stop

