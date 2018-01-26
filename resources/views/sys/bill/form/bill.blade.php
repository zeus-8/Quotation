@php
	$total1 = $total2 = $total3 = $total4 = $total5 = 0
@endphp
<div class="row">
	<div class="col-md-2 text-right"><label>Fecha:<br>Counter:</label></div>
	<div class="col-md-6">{{ $date }}<br>{{ $user->name }} {{ $user->us_last_name }}</div>
	<div class="col-md-4">
		<div class="well">
			<div class="form-group">
				<label class="control-label col-sm-2">N° </label>
				<h4 class="text-danger">{{ $coti['n_quotation'] }}</h4>
				{!! Form::label('Referencia') !!}
				{!! Form::text('ref', null, ['class'=>'form-control', 'placeholder'=>'Referencia']) !!}
				{{ Form::hidden('quotation_id', $coti['id']) }}
				{{ Form::hidden('user_id', $user->id) }}
			</div>
		</div>
	</div>
</div>
@foreach ($customer as $res)
	<div class="panel panel-primary">
		<div class="panel-heading">Datos del Cliente</div>
		<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group has-feedback">
							{!! Form::label('Cedula o Ruc') !!}
							{{ Form::hidden('customer_id', $res->customer) }}
							{!! Form::text('cedula', $res->cu_id_card_ruc, ['class'=>'form-control', 'placeholder'=>'Cedula']) !!}
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
							Cmbiar Datos del Cliente
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
											{!! Form::text('fijo', $res->cu_phone, ['class'=>'form-control', 'placeholder'=>'Fijo']) !!}
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
											{!! Form::text('direccion', $res->cu_address, ['class'=>'form-control', 'placeholder'=>'Direccion']) !!}
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
@endforeach
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
						@if ($coti['date_travel_init'] <> '')
							@php
								$date = new DateTime($coti['date_travel_init']);
								$date = $date->format('d-m-Y');
							@endphp
							{{ $date }}
						@else
							{!! 'N/T' !!}
						@endif
					</div>
					<div class="col-md-3">
						<label>Regreso</label>
					</div>
					<div class="col-md-3">
						@if ($coti['date_travel_end'] <> '')
							@php
								$date1 = new DateTime($coti['date_travel_end']);
								$date1 = $date1->format('d-m-Y');
							@endphp
							{{ $date1 }}
						@else
							{!! 'N/T' !!}
						@endif
					</div>
				</div>
			</div>	
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						@if ($coti['coment'] <> '')
							{{ $coti['coment'] }}
						@else
							{{ $coti['pa_name'] }}
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
						@if ($coti['cant_a'] <> '')
							<tr>
								<td>Adulto Nacional</td>
								<td class="text-right text-success">{{ $coti['cant_a'] }}</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $cost1 = $sub + $coti['ta'] + $coti['ia'] }}
																		@else
																			{{ $res->pa_cost_a }}
																		@endif
																	</label>
								</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $total1 = $cost1 * $coti['cant_a'] }}
																		@else
																			{{ $ta = $res->cant_a * $res->pa_cost_a }}
																		@endif
																	</label>
								</td>
							</tr>
						@endif
						@if ($coti['cant_n'] <> '')
							<tr>
								<td>Niño Nacional</td>
								<td class="text-right text-success">{{ $coti['cant_n'] }}</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $cost2 = $sub + $coti['tn'] + $coti['in'] }}
																		@else
																			{{ $res->pa_cost_n }}
																		@endif
																	</label>
								</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $total2 = $cost2 * $coti['cant_n'] }}
																		@else
																			{{ $tn = $res->cant_n * $res->pa_cost_n }}
																		@endif
																	</label>
								</td>
							</tr>
						@endif
						@if ($coti['cant_te'] <> '')
							<tr>
								<td>Tercera Edad</td>
								<td class="text-right text-success">{{ $rcoti['cant_te'] }}</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $cost3 = $sub + $coti['tee'] + $coti['iee'] }}
																		@else
																			{{ $res->pa_cost_te }}
																		@endif
																	</label>
								</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $total3 = $cost3 * $coti['cant_te'] }}
																		@else
																			{{ $tte = $res->cant_te * $res->pa_cost_te }}
																		@endif
																	</label>
								</td>
							</tr>
						@endif
						@if ($coti['cant_e'] <> '')
							<tr>
								<td>Extranjero</td>
									<td class="text-right text-success">{{ $coti['cant_e'] }}</td>
									<td class="text-right text-success"><label>
																			@if ($op == 1)
																				{{ $cost4 = $sub + $coti['te'] + $coti['ie'] }}
																			@else
																				{{ $res->pa_cost_e }}
																			@endif
																		</label>
									</td>
									<td class="text-right text-success"><label> 
																			@if ($op == 1)
																				{{ $total4 = $cost4 * $coti['cant_e'] }}
																			@else
																				{{ $te = $res->cant_e * $res->pa_cost_e }}
																			@endif
																		</label>
									</td>
							</tr>
						@endif
						@if ($coti['cant_ne'] <> '')
							<tr>
								<td>Niño Extranjero</td>
								<td class="text-right text-success">{{ $coti['cant_ne'] }}</td>
								<td class="text-right text-success"><label>
																		@if ($op == 1)
																			{{ $cost5 = $sub + $coti['tne'] + $coti['ine'] }}
																		@else
																			{{ $res->pa_cost_ne }}
																		@endif
																	</label>
								</td>
								<td class="text-right text-success"><label> 
																		@if ($op == 1)
																			{{ $total5 = $cost5 * $coti['cant_ne'] }}
																		@else
																			{{ $tne = $res->cant_ne * $res->pa_cost_ne }}
																		@endif
																	</label>
								</td>
							</tr> 
						@endif
						<tr>
							<td class="text-right"><label>Total de Personas</label></td>
							<td class="text-right">{{ $tp = $coti['cant_a'] + $coti['cant_n'] + $coti['cant_te'] + $coti['cant_e'] + $coti['cant_ne'] }}</td>
							<td class="text-right"><label>Total</label></td>
							<td class="text-right"><label>{{ $total = $total1 + $total2 + $total3 + $total4 + $total5 }}</label></td>
						</tr>	
					</table>
				</div>
			</div>
		</div>
	</div>
{!! Form::label('Comentario') !!}
{{ Form::textarea('notes', null, ['size' => '50x5']) }}<br><br>