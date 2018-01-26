<div class="panel panel-primary">
    <div class="panel-heading">Datos del Cliente</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    {!! Form::label('Cedula') !!}
                    {{ Form::hidden('customer', $res->customer) }}
                    {{-- {{ Form::hidden('status', '1') }} --}}
                    {!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cedula']) !!}
                    <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nombre y Apellido</label>
                    <p>{{ $res->cu_name }} {{ $res->cu_last_name }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Celular</label>
                    <p>{{ $res->cu_cell_phone }}</p>
                </div>
            </div>
        </div><hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Fijo</label>
                    <p>{{ $res->cu_phone }}</p>
                </div>  
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <p>{{ $res->cu_email }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Direccion</label>
                    <p>{{ $res->cu_address }}</p>
                </div>  
            </div>
        </div>
        <div class="box-group" id="accordion">
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Datos del Cliente
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Nombre') !!}
                                        {!! Form::text('nombre', $res->cu_name, ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Apellido') !!}
                                        {!! Form::text('apellido', $res->cu_last_name, ['class'=>'form-control', 'placeholder'=>'Apellido']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Celular') !!}
                                        {!! Form::text('celular', $res->cu_cell_phone, ['class'=>'form-control', 'placeholder'=>'Celular']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Fijo') !!}
                                        {!! Form::text('fijo', null, ['class'=>'form-control', 'placeholder'=>'Fijo']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Email') !!}
                                        {!! Form::text('email', $res->cu_email, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        {!! Form::label('Direccion') !!}
                                        {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
                                        <span class="glyphicon glyphicon-chevron-left form-control-feedback"></span>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>