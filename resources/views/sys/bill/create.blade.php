@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>Facturar</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Proforma</h3><br>
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
                </div>
            </div>
        </div>
    </section>
@stop
