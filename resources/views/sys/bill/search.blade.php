@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>...</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">Facturar Paquete / Cotizacion</h3>
              </div>
              <div class="box-body">
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'bill.search', 'method'=>'POST']) !!}
                    <div class="form-group has-feedback">
                      {!! Form::label('Nombre /  N° de Cotizacion') !!}
                      {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <label>
                      <input type="radio" name="find" class="minimal" value="1"> Cotizacion
                    </label>
                    <label>
                      <input type="radio" name="find" class="minimal" value="2"> Paquete
                    </label>
                    <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                      <a href="{{ URL::to('user') }}" class="btn btn-danger btn-lg">Cancelar</a>
                    </div>
                  {!! Form::close() !!}
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
