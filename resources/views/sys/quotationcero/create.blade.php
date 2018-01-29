@extends('adminlte::page')

@section('title', 'Cotizacioness')

@section('content_header')
    <h1>Nueva Cotización</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-xs-6 col-sm-6">
<<<<<<< HEAD
                    <h6 class="box-title">Esta cotización laa realizara: {{ $user->name }}, {{ $user->us_last_name }}</h6>
=======
                    <h6 class="box-title">Counter: {{ $user->name }}, {{ $user->us_last_name }}</h6>
>>>>>>> ad7dd850ea76cdb42a90241fd7176f02358c6c42
                  </div>  
                  <div  class="col-xs-6 col-sm-6">
                    <label>Fecha: {{ $carbon }}</label>
                    <h5></h5>
                  </div>
                </div>
              </div>
              <div class="box-body">



                

                @include('sys.quotationcero2.form.quotationcero')
                @include('sys.message.request_message')
                  
                   <?php $op = 1; ?>
                    
                  
                
              </div>
          
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->


@stop





