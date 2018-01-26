@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>Lista de Cotizaciones</h1>
@stop

@section('content')
    <section class="content-header">
@include('sys.message.success_message')

	<!-- Main content -->
	{{-- <section class="content"> --}}
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Registro de Cotizaciones</h3>

					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>N° Cotizacion</th>
								<th>Nombre</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($quotations as $coti)
									<tr>
										<td><b>{{ $coti->n_quotation }}</b></td>
										<td>{{ $coti->cu_name }} {{ $coti->cu_last_name }}</td>
										<td align="center">
											{{-- @if ($coti->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('bill.edit', $coti->id) }}" class="btn btn-success btn-sm" title="Modificar"><span class="glyphicon glyphicon-usd"></span> </a>
												{{-- <a href="{{ route('quotation.destroy', $coti->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a> --}}
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
	{{-- </section> --}}
@stop