@extends('adminlte::page')

@section('title', 'Restaurant')

@section('content_header')
    <h1>Lista de Restaurant</h1>
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
						<h3 class="box-title">Lista de Restaurant</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						 <a href="{{ URL::to('restaurant/create') }}" class="btn btn-success"><i class="fa fa-cutlery"> Nuevo Restaurant</i></a> <br><br> 
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($res as $re)
									<tr>
										<td>{{ $re->id }}</td>
										<td>{{ $re->re_name }}</td>
										<td>{{ $re->re_address }}</td>
										<td>{{ $re->re_cell_phone }}</td>
										<td align="center">
											{{-- @if ($res->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('restaurant.edit', $re->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('restaurant.destroy', $re->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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