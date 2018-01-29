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
        // clientes
        Schema::create('customers', function(Blueprint $table){
            $table->increments('id');
            $table->string('cu_name')->nullable();
            $table->string('cu_last_name')->nullable();
            $table->integer('cu_id_card_ruc')->unique();
            $table->bigInteger('cu_cell_phone')->nullable();
            $table->bigInteger('cu_phone')->nullable();
            $table->string('cu_email')->nullable();
            $table->string('cu_address')->nullable();
            $table->boolean('cu_sex')->nullable();// 0 femenino 1 masculino
            $table->integer('cu_civil_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //empresas
        Schema::create('companies', function(Blueprint $table){
            $table->increments('id');
            $table->string('co_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //fechas
        Schema::create('dates', function(Blueprint $table){
            $table->increments('id');
            $table->string('da_date')->nullable();
            $table->date('da_date_init')->nullable();
            $table->date('da_date_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //localidades
        Schema::create('localities', function(Blueprint $table){
            $table->increments('id');
            $table->string('localitie')->nullable();
            $table->timestamps();
        });
        // referencia
        Schema::create('references', function(Blueprint $table){
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->integer('localitie_id')->unsigned();
            $table->foreign('localitie_id')->references('id')->on('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //guias
        Schema::create('guides', function(Blueprint $table){
            $table->increments('id');
            $table->string('gu_name')->nullable();
            $table->string('gu_last_name')->nullable();
            $table->bigInteger('gu_id_card')->nullable();
            $table->bigInteger('gu_cell_phone')->nullable();
            $table->integer('gu_phone')->nullable();
            $table->string('gu_address')->nullable();
            $table->string('gu_email')->nullable();
            $table->decimal('cost', 6, 2);
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //paquetes
        Schema::create('packages', function(Blueprint $table){
            $table->increments('id');
            $table->string('pa_name')->nullable();
            $table->text('pa_activities')->nullable();
            $table->text('pa_coment')->nullable();
            $table->decimal('pa_cost_a', 6, 2)->nullable();//costo adulto
            $table->decimal('pa_cost_n', 6, 2)->nullable();//costo niño
            $table->decimal('pa_cost_te', 6, 2)->nullable();//costo tercera edad
            $table->decimal('pa_cost_e', 6, 2)->nullable();//costo tercera edad
            $table->decimal('pa_cost_ne', 6, 2)->nullable();//costo tercera edad
            $table->text('pa_observations')->nullable();
            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //cotizaciones
        Schema::create('quotations', function(Blueprint $table){
            $table->increments('id');
            $table->string('coment')->nullable();
            $table->integer('nights')->nullable();
            $table->decimal('breakfast', 5, 2)->nullable();
            $table->decimal('lunch', 5, 2)->nullable();
            $table->decimal('dinner', 5, 2)->nullable();
            $table->decimal('ta', 6, 2)->nullable();
            $table->decimal('ia', 6, 2)->nullable();
            $table->decimal('tn', 6, 2)->nullable();
            $table->decimal('in', 6, 2)->nullable();
            $table->decimal('tte', 6, 2)->nullable();
            $table->decimal('ite', 6, 2)->nullable();
            $table->decimal('te', 6, 2)->nullable();
            $table->decimal('ie', 6, 2)->nullable();
            $table->decimal('tne', 6, 2)->nullable();
            $table->decimal('ine', 6, 2)->nullable();
            $table->integer('cant_a')->nullable();
            $table->integer('cant_n')->nullable();
            $table->integer('cant_te')->nullable();
            $table->integer('cant_e')->nullable();
            $table->integer('cant_ne')->nullable();
            $table->boolean('status')->nullable();//0 sin cotizar 1 cotizado
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            // $table->string('activities');
            // $table->integer('localitie_id');
        });
        //restaurante
        Schema::create('restaurants', function(Blueprint $table){
            $table->increments('id');
            $table->string('re_name')->nullable();
            $table->string('re_address')->nullable();
            $table->integer('re_cell_phone')->nullable();
            $table->integer('re_phone')->nullable();
            $table->decimal('re_cost_breakfast', 5, 2)->nullable();
            $table->decimal('re_cost_lunch', 5, 2)->nullable();
            $table->decimal('re_cost_dinner', 5, 2)->nullable();
            $table->boolean('re_in_hotel')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //  cuartos
        Schema::create('rooms', function(Blueprint $table){
            $table->increments('id');
            $table->string('room')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //servicios
        Schema::create('services', function(Blueprint $table){
            $table->increments('id');
            $table->string('se_service')->nullable();
            $table->decimal('se_cost', 6, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //servicio de hotel
        Schema::create('shotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('sh_service')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //impuestos
        Schema::create('taxes', function(Blueprint $table){
            $table->increments('id');
            $table->string('taxe')->nullable();
            $table->decimal('ta_value', 6, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //tipo de hoteles
        Schema::create('thotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_hotel')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        //tipo de transferencias
        Schema::create('ttransfers', function(Blueprint $table){
            $table->increments('id');
            $table->string('tt_transfer')->nullable();
            $table->timestamps();
        });
        //tipos de usuarios
        Schema::create('tusers', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_user')->nullable(); //descripcion de tipo d usuario
            $table->timestamps();
        });
        //hoteles
        Schema::create('hotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('ho_name')->nullable();
            $table->string('ho_address')->nullable();
            $table->bigInteger('ho_cell_phone')->nullable();
            $table->bigInteger('ho_phone')->nullable();
            $table->integer('ho_ext')->nullable();
            $table->string('ho_email')->nullable();
            $table->string('ho_contac')->nullable();
            $table->integer('thotel_id')->unsigned();//id_tipo_hotel
            $table->foreign('thotel_id')->references('id')->on('thotels')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('restaurant_id')->unsigned();//id_restaurant
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('shotel_id')->unsigned();//id_servicio_hotel
            $table->foreign('shotel_id')->references('id')->on('shotels')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('reference_id')->unsigned()->nullable();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //transferencias
        Schema::create('transfers', function(Blueprint $table){
            $table->increments('id');
            $table->string('tr_name')->nullable();
            $table->string('tr_last_name')->nullable();
            $table->integer('tr_id_card')->nullable();
            $table->integer('tr_cell_phone')->nullable();
            $table->string('tr_coment')->nullable();
            $table->string('tr_cost')->nullable();
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('companie_id')->unsigned()->nullable();
            $table->foreign('companie_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('ttransfer_id')->unsigned()->nullable();
            $table->foreign('ttransfer_id')->references('id')->on('ttransfers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('us_last_name')->nullable();
            $table->integer('us_id_card')->unique();
            $table->string('email', 40)->unique();
            $table->bigInteger('us_cell_phone')->nullable();
            $table->bigInteger('us_phone')->nullable();
            $table->string('password')->nullable();
            $table->integer('tuser_id')->unsigned();
            $table->foreign('tuser_id')->references('id')->on('tusers')->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        // facturas
        Schema::create('bills', function(Blueprint $table){
            $table->increments('id');
            $table->string('bi_coment')->nullable();
            $table->date('bi_date')->nullable();
            $table->dateTime('bi_hour')->nullable();
            $table->integer('bi_nbill')->nullable();
            $table->integer('bi_bill_ref')->nullable();//numero de factura fisica
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quotation_id')->unsigned();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //paquete-transporte
        Schema::create('package_transfers', function(Blueprint $table){
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('transfer_id')->unsigned();
            $table->integer('cant_transfer')->nullable();
            $table->decimal('cost_transfer', 6, 2)->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transfer_id')->references('id')->on('transfers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //guia - paquete
        Schema::create('guide_package', function(Blueprint $table){
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('guide_id')->unsigned();
            $table->integer('cant_guide')->nullable();
            $table->decimal('cost_guide', 6, 2)->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guide_id')->references('id')->on('guides')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //paquete - servicio
        Schema::create('package_service', function(Blueprint $table){
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        
        //relacion hoteles habitaciones
        Schema::create('hotel_room', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->decimal('cost', 6, 2)->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion hotel paquete
        Schema::create('hotel_package', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->integer('room_id')->nullable();
            $table->integer('nights')->nullable();
            $table->decimal('cost_room', 6, 2)->nullable();
            $table->integer('cant_room')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        
        //relacion cotizacion-hotel
        Schema::create('hotel_quotation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('quotation_id')->unsigned();
            $table->integer('room_id')->nullable();
            $table->integer('nights')->nullable();
            $table->decimal('cost_room', 6, 2)->nullable();
            $table->integer('cant_room')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion cotizacion-guia
        Schema::create('guide_quotation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('guide_id')->unsigned();
            $table->integer('quotation_id')->unsigned();
            $table->integer('cant_guide')->nullable();
            $table->decimal('cost_guide', 6, 2)->nullable();
            $table->foreign('guide_id')->references('id')->on('guides')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion cotizacion-transporte
        Schema::create('quotation_transfer', function(Blueprint $table){
            $table->increments('id');
            $table->integer('quotation_id')->unsigned();
            $table->integer('transfer_id')->unsigned();
            $table->integer('cant_tranmsfer')->nullable();
            $table->decimal('cost_transfer')->nullable();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transfer_id')->references('id')->on('transfers')->onUpdate('cascade')->onDelete('cascade');
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
