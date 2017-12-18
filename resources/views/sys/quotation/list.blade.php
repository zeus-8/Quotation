@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
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
						<h3 class="box-title">Usuarios Registrados</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('usuario/create') }}" class="btn btn-success"><i class="fa fa-user-plus"> Nuevo Usiario</i></a> <br><br> 
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>N°</th>
								<th>Cliente</th>
								<th>Fecha</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->cedula }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->apellido }}</td>
										<td>{{ $user->descripcion }}</td>
										<td align="center">
											{{-- @if ($user->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('usuario.destroy', $user->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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