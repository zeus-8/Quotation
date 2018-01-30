@extends('adminlte::page')

@section('title', 'Transporte')

@section('content_header')
    <h1>Lista de Transportes</h1>
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
						<h3 class="box-title">Listado de los Transportes</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('transport/create') }}" class="btn btn-success"><i class="fa fa-car"> Nuevo Transporte</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>Id</th>
								<th>Empresa</th>
								<th>Tipo de Servicio</th>
								<th>Costo</th>
								<th>Tipo</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($transfers as $transfer)
									<tr>
										<td>{{ $transfer->id }}</td>
										<td>{{ $transfer->co_name }}</td>
										<td>{{ $transfer->type_service }}</td>
										<td class="text-right"><label>{{ $transfer->tr_cost }}</label></td>
										<td><label>{{ $transfer->tt_transfer }}</label></td>
										<td align="center">
											{{-- @if ($transport->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('transport.edit', $transfer->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('transport.destroy', $transfer->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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

