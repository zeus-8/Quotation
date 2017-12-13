@extends('adminlte::page')

@section('title', 'Hoteles')

@section('content_header')
    <h1>Lista de Hoteles</h1>
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
						<h3 class="box-title">Hoteles Registrados</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('hostel/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Usiario</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>C. I.</th>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($hotels as $hostel)
									<tr>
										<td>{{ $hotel->id }}</td>
										<td>{{ $hotel->name_h }}</td>
										<td>{{ $hotel->direccion_h }}</td>
										<td>{{ $hotel->celular_h }}</td> 
										<td align="center">
											{{-- @if ($hotel->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('hostel.edit', $hotel->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('hostel.destroy', $hotel->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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

