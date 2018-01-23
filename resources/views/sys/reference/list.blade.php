@extends('adminlte::page')

@section('title', 'Referencias')

@section('content_header')
    <h1>Lista de Referencias</h1>
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
						<h3 class="box-title">Lista de Referencias</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						{{-- <a href="{{ URL::to('location/create') }}" class="btn btn-success"><i class="fa fa-location-arrow"> Nueva Localidad</i></a> <br><br>  --}}

						<div class="panel panel-primary">
						  <div class="panel-heading">Agregue una Referencia</div>
						  <div class="panel-body">
							@include('sys.message.request_message')
							{!! Form::open(['route'=>'reference.store', 'method'=>'POST']) !!}
								<?php $op = 1; ?>
								@include('sys.reference.form.reference')
								<div class="form-group">
								{!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
								</div>
							{!! Form::close() !!}
						  </div>
						</div>

						 <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								<th>Id.</th>
								<th>Referencias</th>
								<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($references as $reference)
									<tr>
										<td>{{ $reference->id }}</td>
										<td>{{ $reference->reference }}</td>
										<td align="center">
											{{-- @if ($user->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('reference.edit', $reference->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('reference.destroy', $reference->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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

