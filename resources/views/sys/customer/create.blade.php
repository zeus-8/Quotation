@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Nuevos Clientes</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
        <!-- Default box -->
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Cliente</h3>
                    </div>
                    <div class="box-body">
                        @include('sys.message.request_message')
                        {!! Form::open(['route'=>'customer.store', 'method'=>'POST']) !!}
                            <?php $op = 1; ?>
                            @include('sys.customer.form.customer')
                            <div class="form-group">
                                {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-lg']) !!}
                                <a href="{{ URL::to('customer') }}" class="btn btn-danger btn-lg">Cancelar</a>
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
@section('js')
    <script>
        $(function () {
            $('#datepicker').datepicker({
              autoclose: true
            })
        })
    </script>
@stop
