@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>Facturar</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">Facturar</h3><br>
                <div class="row">
                  <div class="col-md-6">
                    <dl>
                      <dt>Usuario:</dt>
                      <dd>{{ $user->name }} {{ $user->us_last_name }}</dd>
                      <dt>Fecha:</dd>
                      <dd>{{ $carbon }}</dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl>
                      <dt>Referencia</dt>
                      <dd>
                        <div class="form-group">
                          <input maxlength="9" m type="text" class="form-control input-sm">
                        </div>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="box-body">
                @include('sys.message.request_message')
                  {!! Form::open(['route'=>'bill.store', 'method'=>'POST']) !!}
                     @include('sys.bill.form.bill')
                     <div class="form-group">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                      <a href="{{ URL::to('bill') }}" class="btn btn-danger btn-lg">Cancelar</a>
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
