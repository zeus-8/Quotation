@if (Session::has('message'))
	<div class="alert alert-success alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<h4><i class="icon fa fa-check"></i> Excelente!!!</h4>
        {{Session::get('message')}}
  	</div>
@endif