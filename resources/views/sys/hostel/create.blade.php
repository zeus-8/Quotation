@extends('adminlte::page')

@section('title', 'Hoteles')

@section('content_header')
    <h1>Nuevos Hoteles</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">Agregar Hotel</h3>
              </div>
              <div class="box-body">
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'hostel.store', 'method'=>'POST']) !!}
                   <?php $op = 1; ?>
                     @include('sys.hostel.form.hostel')
                     <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
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
