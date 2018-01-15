@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Edicion de Clientes</h1>
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
                {!! Form::model($customer,['route'=>['customer.update', $customer->id], 'method'=>'PUT']) !!}
                   <?php $op = 2; ?>
                   @include('sys.customer.form.customer')
                   <div class="form-group">
                    {!! Form::submit('Modificar', ['class'=>'btn btn-primary btn-lg']) !!}
                    <a href="{{ URL::to('customer') }}" class="btn btn-danger btn-lg">Cancelar</a>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
@stop

