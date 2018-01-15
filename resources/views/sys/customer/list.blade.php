@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <section class="content-header">
@include('sys.message.success_message')

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Clientes Registrados</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('customer/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Cliente</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>C.I</th>
								<th>Nombre y Apellido</th>
								<th>Email</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($customers as $customer)
									<tr>
										<td>{{ $customer->cu_id_card_ruc }}</td>
										<td>{{ $customer->cu_name }} {{ $customer->cu_last_name }}</td>
										<td>{{ $customer->cu_email }}</td>
										<td align="center">
											{{-- @if ($customer->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('customer.destroy', $customer->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
											{{-- @endif --}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

