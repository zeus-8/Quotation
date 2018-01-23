@extends('adminlte::page')

@section('title', 'Referencias')

@section('content_header')
    <h1>Edicion de Referencias</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="register-box-body">
                        <div class="box-header whith-border"><h3 class="box-title">Actualizacion de Referencias</h3></div>
                        @include('sys.message.request_message')    
                        {!! Form::model($reference,['route'=>['reference.update', $reference->id], 'method'=>'PUT']) !!}
                            <?php $op = 2; ?>
                            @include('sys.reference.form.reference')
                            <div class="form-group">
                                {!! Form::submit('Modificar', ['class'=>'btn btn-primary btn-lg']) !!}
                                <a href="{{ URL::to('reference') }}" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

