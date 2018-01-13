@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>Lista de ...</h1>
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
						<h3 class="box-title"> Registrados</h3>

					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>Nombre</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								{{-- @foreach ($users as $user)
									<tr>
										<td>{{ $user->us_id_card }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->us_last_name }}</td>
										<td>{{ $user->type_user }}</td>
										<td align="center">
											@if ($user->descripcion_tu == 'ADMIN')	
												<a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('usuario.destroy', $user->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
											@endif
										</td>
									</tr>
								@endforeach --}}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	{{-- </section> --}}
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