@extends('adminlte::page')

@section('title', 'Paquetes')

@section('content_header')
    <h1>Nuevos Paquetes</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
          <!-- Default box -->
          <div class="col-md">
            <div class="box box-primary ">







              <div class="box-header with-border">
                <h3 class="box-title">Nuevo Paquete</h3>
              </div>

 


              <div class="box-body">
                @include('sys.message.request_message')
               
                   <?php $op = 1; ?>
                     @include('sys.packages.form.package')
                  
            
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
