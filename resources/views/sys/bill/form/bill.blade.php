@foreach ($result as $res)
	<div class="row">
		<div class="col-md-2 text-right"><label>Fecha:<br>Counter:</label></div>
		<div class="col-md-6">{{ $date }}<br>{{ $user->name }} {{ $user->us_last_name }}</div>
		<div class="col-md-4">
			<div class="well">
				<div class="form-group">
					<label class="control-label col-sm-2">N° </label>
					<h4 class="text-danger">{{ $res->n_quotation }}</h4>
					{!! Form::label('Referencia') !!}
					{!! Form::text('ref', null, ['class'=>'form-control', 'placeholder'=>'Referencia']) !!}
					{{ Form::hidden('quotation', $res->id) }}
				</div>
			</div>
		</div>
	</div>
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
	<hr>
	<div class="panel panel-primary">
		<div class="panel-heading">Descripcion</div>
		<div class="panel-body">
			<div class="well">
				<div class="row">
					<div class="col-md-3">
						<label>Salida</label>
					</div>
					<div class="col-md-3">
						@if ($res->date_travel_init <> '')
							{{ $res->date_travel_init }}
						@else
							{!! 'N/T' !!}
						@endif
					</div>
					<div class="col-md-3">
						<label>Regreso</label>
					</div>
					<div class="col-md-3">
						@if ($res->date_travel_end <> '')
							{{ $res->date_travel_end }}
						@else
							{!! 'N/T' !!}
						@endif
					</div>
				</div>
			</div>	
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						@if ($res->coment <> '')
							{{ $res->coment }}
						@else
							{{ $res->pa_name }}
						@endif
					</h3>
				</div>
				<div class="box-body no-padding">
					<table class="table table-condensed table-hover">
						<tr class="text-center">
							<th class="text-center">Descripcion</th>
							<th class="text-center" style="width: 10px">Cant.</th>
							<th class="text-center">Precio</th>
							<th class="text-center" style="width: 80px">Total</th>
						</tr>
						<tr>
							<td>Adulto Nacional</td>
							@if ($res->cant_a <> '')
								<td class="text-right text-success">{{ $res->cant_a }}</td>
								<td class="text-right text-success"><label>$ {{ $res->pa_cost_a }}</label></td>
								<td class="text-right text-success"><label>$ {{ $ta = $res->cant_a * $res->pa_cost_a }}</label></td>
							@else
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">{{ $ta = 0 }}</td>
							@endif
						</tr>
						<tr>
							<td>Niño Nacional</td>
							@if ($res->cant_n <> '')
								<td class="text-right text-success">{{ $res->cant_n }}</td>
								<td class="text-right text-success"><label>$ {{ $res->pa_cost_n }}</label></td>
								<td class="text-right text-success"><label>$ {{ $tn = $res->cant_n * $res->pa_cost_n }}</label></td>
							@else
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">{{ $tn = 0 }}</td>
							@endif
						</tr>
						<tr>
							<td>Tercera Edad</td>
							@if ($res->cant_te <> '')
								<td class="text-right text-success">{{ $res->cant_te }}</td>
								<td class="text-right text-success"><label>$ {{ $res->pa_cost_te }}</label></td>
								<td class="text-right text-success"><label>$ {{ $tte = $res->cant_te * $res->pa_cost_te }}</label></td>
							@else
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">{{ $tte = 0 }}</td>
							@endif
						</tr>
						<tr>
							<td>Extranjero</td>
							@if ($res->cant_e <> '')
								<td class="text-right text-success">{{ $res->cant_e }}</td>
								<td class="text-right text-success"><label>$ {{ $res->pa_cost_e }}</label></td>
								<td class="text-right text-success"><label>$ {{ $te = $res->cant_e * $res->pa_cost_e }}</label></td>
							@else
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">{{ $te = 0 }}</td>
							@endif
						</tr>
						<tr>
							<td>Niño Extranjero</td>
							@if ($res->cant_ne <> '')
								<td class="text-right text-success">{{ $res->cant_ne }}</td>
								<td class="text-right text-success">$ {{ $res->pa_cost_ne }}</td>
								<td class="text-right text-success">$ {{ $tne = $res->cant_ne * $res->pa_cost_ne }}</td>
							@else
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">0</td>
								<td class="text-right text-danger">{{ $tne = 0 }}</td>
							@endif
						</tr>
						<tr>
							<td class="text-right"><label>Total de Personas</label></td>
							<td class="text-right">{{ $tp = $res->cant_a + $res->cant_n + $res->cant_te + $res->cant_e + $res->cant_ne }}</td>
							<td class="text-right"><label>Total</label></td>
							<td class="text-right"><label>$ {{ $tt = $ta + $tn + $tte + $te + $tne }}</label></td>
						</tr>	
					</table>
				</div>
			</div>
		</div>
	</div>
@endforeach
{!! Form::label('Comentario') !!}
{{ Form::textarea('notes', null, ['size' => '50x5']) }}<br><br>