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
            $table->string('cu_name');
            $table->string('cu_last_name');
            $table->integer('cu_id_card_ruc')->unique();
            $table->bigInteger('cu_cell_phone');
            $table->bigInteger('cu_phone');
            $table->string('cu_email');
            $table->string('cu_address');
            $table->boolean('cu_sex');// 0 femenino 1 masculino
            $table->integer('cu_civil_status');
            $table->timestamps();
            $table->softDeletes();
        });
        //empresas
        Schema::create('companies', function(Blueprint $table){
            $table->increments('id');
            $table->string('co_name');
            $table->timestamps();
            $table->softDeletes();
        });
        //fechas
        Schema::create('dates', function(Blueprint $table){
            $table->increments('id');
            $table->string('da_date');
            $table->date('da_date_init');
            $table->date('da_date_end');
            $table->timestamps();
            $table->softDeletes();
        });
        //localidades
        Schema::create('localities', function(Blueprint $table){
            $table->increments('id');
            $table->string('localitie');
            $table->timestamps();
        });
        // referencia
        Schema::create('references', function(Blueprint $table){
            $table->increments('id');
            $table->string('reference');
            $table->integer('localitie_id')->unsigned();
            $table->foreign('localitie_id')->references('id')->on('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //guias
        Schema::create('guides', function(Blueprint $table){
            $table->increments('id');
            $table->string('gu_name');
            $table->string('gu_last_name');
            $table->bigInteger('gu_id_card');
            $table->bigInteger('gu_cell_phone');
            $table->integer('gu_phone');
            $table->string('gu_address');
            $table->string('gu_email');
            $table->decimal('cost', 6, 2);
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //paquetes
        Schema::create('packages', function(Blueprint $table){
            $table->increments('id');
            $table->string('pa_name');
            $table->text('pa_activities');
            $table->text('pa_coment');
            $table->decimal('pa_cost_a', 6, 2);//costo adulto
            $table->decimal('pa_cost_n', 6, 2);//costo niño
            $table->decimal('pa_cost_te', 6, 2);//costo tercera edad
            $table->decimal('pa_cost_e', 6, 2);//costo tercera edad
            $table->decimal('pa_cost_ne', 6, 2);//costo tercera edad
            $table->decimal('pa_ta', 6, 2);
            $table->decimal('pa_ia', 6, 2);
            $table->decimal('pa_tn', 6, 2);
            $table->decimal('pa_in', 6, 2);
            $table->decimal('pa_tte', 6, 2);
            $table->decimal('pa_ite', 6, 2);
            $table->decimal('pa_te', 6, 2);
            $table->decimal('pa_ie', 6, 2);
            $table->decimal('pa_tne', 6, 2);
            $table->decimal('pa_ine', 6, 2);
            $table->text('pa_observations');
            $table->timestamps();
            $table->softDeletes();
        });
        //cotizaciones
        Schema::create('quotations', function(Blueprint $table){
            $table->increments('id');
            $table->string('n_quotation');
            $table->string('coment');
            $table->integer('days');
            $table->integer('nights');
            $table->decimal('breakfast', 5, 2);
            $table->decimal('lunch', 5, 2);
            $table->decimal('dinner', 5, 2);
            $table->decimal('ta', 6, 2);
            $table->decimal('ia', 6, 2);
            $table->decimal('tn', 6, 2);
            $table->decimal('in', 6, 2);
            $table->decimal('tte', 6, 2);
            $table->decimal('ite', 6, 2);
            $table->decimal('te', 6, 2);
            $table->decimal('ie', 6, 2);
            $table->decimal('tne', 6, 2);
            $table->decimal('ine', 6, 2);
            $table->integer('cant_a');
            $table->integer('cant_n');
            $table->integer('cant_te');
            $table->integer('cant_e');
            $table->integer('cant_ne');
            $table->integer('cost_q');
            $table->decimal('gain', 6, 2);
            $table->boolean('status');//0 sin cotizar 1 cotizado
            $table->date('date_travel_init');
            $table->date('date_travel_end');
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
            $table->string('re_name');
            $table->string('re_address');
            $table->integer('re_cell_phone');
            $table->integer('re_phone');
            $table->decimal('re_cost_breakfast', 5, 2);
            $table->decimal('re_cost_lunch', 5, 2);
            $table->decimal('re_cost_dinner', 5, 2);
            $table->boolean('re_in_hotel');
            $table->timestamps();
            $table->softDeletes();
        });
        //  cuartos
        Schema::create('rooms', function(Blueprint $table){
            $table->increments('id');
            $table->string('room');
            $table->timestamps();
            $table->softDeletes();
        });
        //servicios
        Schema::create('services', function(Blueprint $table){
            $table->increments('id');
            $table->string('se_service');
            $table->decimal('se_cost', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });
        //servicio de hotel
        Schema::create('shotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('sh_service');
            $table->timestamps();
            $table->softDeletes();
        });
        //impuestos
        Schema::create('taxes', function(Blueprint $table){
            $table->increments('id');
            $table->string('taxe');
            $table->decimal('ta_value', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });
        //tipo de hoteles
        Schema::create('thotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_hotel');
            $table->timestamps();
            $table->softDeletes();
        });
        //tipo de transferencias
        Schema::create('ttransfers', function(Blueprint $table){
            $table->increments('id');
            $table->string('tt_transfer');
            $table->timestamps();
        });
        //tipos de usuarios
        Schema::create('tusers', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_user'); //descripcion de tipo d usuario
            $table->timestamps();
        });
        //hoteles
        Schema::create('hotels', function(Blueprint $table){
            $table->increments('id');
            $table->string('ho_name');
            $table->string('ho_address');
            $table->bigInteger('ho_cell_phone');
            $table->bigInteger('ho_phone');
            $table->integer('ho_ext');
            $table->string('ho_email');
            $table->string('ho_contac');
            $table->integer('thotel_id')->unsigned();//id_tipo_hotel
            $table->foreign('thotel_id')->references('id')->on('thotels')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('restaurant_id')->unsigned();//id_restaurant
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('shotel_id')->unsigned();//id_servicio_hotel
            $table->foreign('shotel_id')->references('id')->on('shotels')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //transferencias
        Schema::create('transfers', function(Blueprint $table){
            $table->increments('id');
            $table->string('tr_name');
            $table->string('tr_last_name');
            $table->integer('tr_id_card');
            $table->string('type_service');
            $table->integer('tr_cell_phone');
            $table->string('tr_coment');
            $table->string('tr_cost');
            $table->integer('cap_max');
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('companie_id')->unsigned();
            $table->foreign('companie_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('ttransfer_id')->unsigned();
            $table->foreign('ttransfer_id')->references('id')->on('ttransfers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        //usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('us_last_name');
            $table->integer('us_id_card')->unique();
            $table->string('email', 40)->unique();
            $table->bigInteger('us_cell_phone');
            $table->bigInteger('us_phone');
            $table->string('password');
            $table->integer('tuser_id')->unsigned();
            $table->foreign('tuser_id')->references('id')->on('tusers')->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        // facturas
        Schema::create('bills', function(Blueprint $table){
            $table->increments('id');
            $table->string('bi_coment');
            $table->string('bi_nbill');
            $table->integer('bi_bill_ref');//numero de factura fisica
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
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transfer_id')->references('id')->on('transfers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //guia - paquete
        Schema::create('guide_package', function(Blueprint $table){
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('guide_id')->unsigned();
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
        //fechas - paquetes
        Schema::create('package_date', function(Blueprint $table){
            $table->increments('id');
            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion hoteles habitaciones
        Schema::create('hotel_room', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->decimal('cost', 6, 2);
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion hotel paquete
        Schema::create('hotel_package', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion entre cliente-paquete
        Schema::create('customer_package', function(Blueprint $table){
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion cotizacion-hotel
        Schema::create('hotel_quotation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('quotation_id')->unsigned();
            $table->integer('room_id');
            $table->integer('nights');
            $table->decimal('cost_room', 6, 2);
            $table->integer('cant_room');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion cotizacion-guia
        Schema::create('guide_quotation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('guide_id')->unsigned();
            $table->integer('quotation_id')->unsigned();
            $table->integer('cant_guide');
            $table->foreign('guide_id')->references('id')->on('guides')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        //relacion cotizacion-transporte
        Schema::create('quotation_transfer', function(Blueprint $table){
            $table->increments('id');
            $table->integer('quotation_id')->unsigned();
            $table->integer('transfer_id')->unsigned();
            $table->integer('cant_transfer');
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
