<div class="panel panel-primary">
    <div class="panel-heading">Datos del Hotel</div>
    <div class="panel-body">
        <dl>
            <dt>Nombre del Cliente</dt>
            <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Cliente']) !!}
                  <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
            </dd>
            <dt>Nombre del Apellido</dt>
            <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Apellido']) !!}
                  <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
            </dd><dt>Cedula o Ruc</dt>
            <dd>
                <div class="form-group has-feedback">
                    @if ($op == 2)
                        {!! Form::text('cedula_ruc', null, ['class'=>'form-control', 'placeholder'=>'Cedula o Ruc', 'disabled']) !!}
                    @else
                        {!! Form::text('cedula_ruc', null, ['class'=>'form-control', 'placeholder'=>'Cedula o Ruc']) !!}
                    @endif
                  <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
            </dd>
            <dt>Celular</dt>
            <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Celular']) !!}
                  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
            </dd>
            <dt>Telefo Fijo</dt>
            <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('fijo', null, ['class'=>'form-control', 'placeholder'=>'Telefono-Fijo']) !!}
                  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
            </dd><dt>Email</dt>
            <dd>
                <div class="form-group has-feedback">
                  @if($op == 2)
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com', 'disabled']) !!}
                  @else
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com']) !!}
                  @endif
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
            </dd>
            <dt>Direccion</dt>
            <dd>
                <div class="form-group has-feedback">
                  {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
                  <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
            </dd>
           {{--  <div class="row">
                <div class="col-md-6">
                    <dt>Sexo</dt>
                    <dd>
                        <div class="well">
                            <label>{{ Form::radio('sexo', 1) }} Masculino</label>
                            <label>{{ Form::radio('sexo', 0) }} Femenino</label>
                               
                        </div>
                    </dd>    
                </div>
                <div class="col-md-6">
                    <dt>Estado Civil</dt>
                    <dd>
                        <div class="well">
                            <select class="form-control" name="edo_civil">
                                <option value="">Seleccione</option>
                                @foreach ($select as $opc)
                                    <option value="1"></option>
                                    
                                @endforeach
                                <option value="2">Casado(a)</option>
                                <option value="3">Divorciado(a)</option>
                                <option value="4">Viudo(a)</option>
                            </select>
                        </div>
                    </dd>
                </div>
                <div class="col-md-4">
                    <dt>Cumpleaños</dt>
                    <dd>
                        <div class="well">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="cumple_ano" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                    </dd>
                </div>
            </div> --}}
            {{-- <dt></dt>
            <dd></dd>
            <dt></dt>
            <dd></dd>
            <dt></dt>
            <dd></dd> --}}
        </dl>
    </div>
</div>