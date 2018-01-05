@extends('adminlte::page')

@section('title', 'Cotizaciones')

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
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'quotation.store', 'method'=>'POST']) !!}
                   <?php $op = 1; ?>
                    @include('sys.quotation.form.quotation')
                     <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                      {{-- <a href="{{ URL::to('quotation') }}" class="btn btn-danger btn-lg">Cancelar</a> --}}
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
