@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Nuevas Habitaciones</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">Nueva Habitacion</h3>
              </div>
              <div class="box-body">
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'bed.store', 'method'=>'POST']) !!}
                     @include('sys.bedroom.form.bedroom')
                     <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                      <a href="{{ URL::to('bed') }}" class="btn btn-danger btn-lg">Cancelar</a>
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
