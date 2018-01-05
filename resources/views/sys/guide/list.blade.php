@extends('adminlte::page')

@section('title', 'Guias')

@section('content_header')
    <h1>Lista de Guias</h1>
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
						<h3 class="box-title">Guias Registrados</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('guide/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Usiario</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>C. I.</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Referencia</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($guides as $guide)
									<tr>
										<td>{{ $guide->gu_id_card }}</td>
										<td>{{ $guide->gu_name }}</td>
										<td>{{ $guide->gu_last_name }}</td>
										<td>{{ $guide->reference }}</td>
										<td align="center">
											{{-- @if ($guide->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('guide.edit', $guide->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('guide.destroy', $guide->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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
  })
    </script>
@stop