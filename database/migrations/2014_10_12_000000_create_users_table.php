<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('impuestos', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('valor');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('servicios', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->decimal('costo', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });                

        Schema::create('tipo_usu', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion'); //descripcion de tipo d usuario
            $table->timestamps();
        });

        Schema::create('localidades', function(Blueprint $table){
            $table->increments('id');
            $table->string('localidad');
            $table->timestamps();
        });
                
        Schema::create('guias', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('cedula');
            $table->bigInteger('celular');
            $table->integer('fijo');
            $table->string('direccion');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });        

        Schema::create('tipo_trans', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('transportes', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre_chofer');
            $table->string('apellido_chofer');
            $table->integer('cedula');
            $table->integer('telef_chofer');
            $table->string('descripcion_trans');
            $table->integer('id_emp')->unsigned();
            $table->foreign('id_emp')->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_tt')->unsigned();
            $table->foreign('id_tt')->references('id')->on('tipo_trans')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('habitaciones', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('tipo_hotel', function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('restaurant', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('telefono');
            $table->decimal('costo_desayuno', 5, 2);
            $table->decimal('costo_almuerzo', 5, 2);
            $table->decimal('costo_cena', 5, 2);
            $table->boolean('en_hotel');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('servi_hotel', function(Blueprint $table){
            $table->increments('id');
            $table->string('servicio');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('hoteles', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->bigInteger('celular');
            $table->bigInteger('fijo');
            $table->string('email');
            $table->string('contacto');
            $table->integer('id_th')->unsigned();//id_tipo_hotel
            $table->foreign('id_th')->references('id')->on('tipo_hotel')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_res')->unsigned();//id_restaurant
            $table->foreign('id_res')->references('id')->on('restaurant')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_serh')->unsigned();//id_servicio_hotel
            $table->foreign('id_serh')->references('id')->on('servi_hotel')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
                
        Schema::create('paquetes', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('costop', 6, 2);
            $table->text('observaciones');
            $table->date('comienzo');
            $table->date('final');
            $table->timestamps();
            $table->softDeletes();
        });
                
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido');
            $table->integer('cedula')->unique();
            $table->string('email', 40)->unique();
            $table->bigInteger('celular');
            $table->bigInteger('fijo');
            $table->string('direccion');
            $table->string('password');
            $table->integer('id_tu')->unsigned();
            $table->foreign('id_tu')->references('id')->on('tipo_usu')->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cot_ven', function(Blueprint $table){
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
                
        Schema::create('loc_gui', function(Blueprint $table){
            $table->increments('id');
            $table->integer('localidades_id')->unsigned();
            $table->integer('guias_id')->unsigned();
            $table->decimal('costo', 6, 2);
            $table->foreign('localidades_id')->references('id')->on('localidades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guias_id')->references('id')->on('guias')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('paq_tran', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_p')->unsigned();
            $table->integer('id_trans')->unsigned();
            $table->foreign('id_p')->references('id')->on('paquetes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_trans')->references('id')->on('transportes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('paq_hot', function(Blueprint $table){
            $table->increments('id');
            $table->integer('paquetes_id')->unsigned();
            $table->integer('hoteles_id')->unsigned();
            $table->foreign('paquetes_id')->references('id')->on('paquetes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hoteles_id')->references('id')->on('hoteles')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('paq_gui', function(Blueprint $table){
            $table->increments('id');
            $table->integer('paquetes_id')->unsigned();
            $table->integer('guias_id')->unsigned();
            $table->foreign('paquetes_id')->references('id')->on('paquetes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guias_id')->references('id')->on('guias')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cov_paq', function(Blueprint $table){
            $table->increments('id');
            $table->integer('cot_ven_id')->unsigned();
            $table->integer('paquetes_id')->unsigned();
            $table->foreign('cot_ven_id')->references('id')->on('cot_ven')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('paquetes_id')->references('id')->on('paquetes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ser_paq', function(Blueprint $table){
            $table->increments('id');
            $table->integer('servicios_id')->unsigned();
            $table->integer('paquetes_id')->unsigned();
            $table->foreign('servicios_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('paquetes_id')->references('id')->on('paquetes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('hot_hab', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_hot')->unsigned();
            $table->integer('id_hab')->unsigned();
            $table->decimal('costo', 6, 2);
            $table->foreign('id_hot')->references('id')->on('hoteles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_hab')->references('id')->on('habitaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
