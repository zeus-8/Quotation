@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1>Lista de Habitaciones</h1>
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
						<h3 class="box-title">Tipos de Habitaciones</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
		                @include('sys.message.request_message')
		                  {!! Form::open(['route'=>'bed.store', 'method'=>'POST']) !!}
		                     @include('sys.bedroom.form.bedroom')
		                     <div class="form-group">
		                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		                    </div>
		                  {!! Form::close() !!}
		              </div>
					<hr>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Descripcion</th>
									<th>ACCION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($beds as $bed)
									<tr>
										<td>{{ $bed->id }}</td>
										<td>{{ $bed->room }}</td>
										<td align="center">
											{{-- @if ($bed->descripcion_tu == 'ADMIN')	 --}}
												<a href="{{ route('bed.edit', $bed->id) }}" class="btn btn-warning btn-sm" title="Modificar"><span class="glyphicon glyphicon-wrench"></span> </a>
												<a href="{{ route('bed.destroy', $bed->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger btn-sm" title="Eliminar"><span class="glyphicon glyphicon-trash"></span> </a>
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

