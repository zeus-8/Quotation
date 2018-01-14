<div class="panel panel-primary">
	<div class="panel-heading">Datos del Cliente</div>
	<div class="panel-body">
		@if ($res->op == 1)
		@foreach ($res as $re)
			<div class="form-group">
				<label class="control-label col-sm-2">Nombre y Apellido</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_name }} {{ $re->cu_last_name }}</p>
				</div>
				 <label class="control-label col-sm-2">Cedula</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_id_card_ruc }}</p>
				</div>
				<label class="control-label col-sm-2">Celular</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_cell_phone }}</p>
				</div>
				<label class="control-label col-sm-2">Fijo</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_phone }}</p>
				</div>
				<label class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_email }}</p>
				</div>
				<label class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
					<p class="form-control-static">{{ $re->cu_address }}</p>
				</div> 
			</div>
		@endforeach
			
		 {{-- @elseif ($res->op == 2) 
			false expr
		@endif 
		@foreach ($res as $otro)
			{{ $otro->cu_name }}
		@endforeach--}}
		@endif
	</div>
</div>
<hr>
<div class="panel panel-primary">
  <div class="panel-heading">Descripcion</div>
  <div class="panel-body">
  	@if ($res->op == 1)
		<div class="form-group">
			<label class="control-label col-sm-2">N° Cotizacion</label>
			<div class="col-sm-10">
				<p class="form-control-static">{{-- $res[0]['id'] --}}</p>
			</div>
			<label class="control-label col-sm-2">Nombre y Apellido</label>
			<div class="col-sm-10">
				<p class="form-control-static">{{-- $res[0]['coment'] --}}</p>
			</div>
		</div>
  	{{-- @elseif($res->op == 2) --}}
  		{{-- {{ dd('estamos en eso') }} --}}
  	@endif
  </div>
</div>