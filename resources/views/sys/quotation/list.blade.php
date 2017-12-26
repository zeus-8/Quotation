@extends('adminlte::page')

@section('title', 'Cotización')

@section('content_header')
    <h1>Lista de Cotizaciones</h1>
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
						<h3 class="box-title">Paquetes a Cotizar</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 {{-- <a href="{{ URL::to('usuario/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Usiario</i></a> <br><br>  --}}
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>N°</th>
								<th>Nombre</th>
								<th>Costo</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pakages as $pakage)
									<tr>
										<td>{{ $pakage->id }}</td>
										<td>{{ $pakage->pa_name }}</td>
										<td>{{ $pakage->pa_cost }}</td>
										<td align="center">
											{{-- @if ($pakage->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('quotation.create1', $pakage->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												{{-- <a href="{{ route('usuario.destroy', $pakage->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a> --}}
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

@section('js')
    <script>
    	$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
    </script>
@stop