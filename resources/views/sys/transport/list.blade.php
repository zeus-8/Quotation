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
						 <a href="{{ URL::to('usuario/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Usiario</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>Empresa</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>C. I.</th>
								<th>Tipo</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($transports as $transport)
									<tr>
										<td>{{ $transport->nombre }}</td>
										<td>{{ $transport->nombre_chofer }}</td>
										<td>{{ $transport->apellido_chofer }}</td>
										<td>{{ $transport->cedula }}</td>
										<td>{{ $transport->descripcion }}</td>
										<td align="center">
											{{-- @if ($transport->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('transport.edit', $transport->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('transport.destroy', $transport->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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

