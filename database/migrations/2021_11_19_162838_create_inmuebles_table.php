<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->bigInteger('localidad_id')->unsigned();
            $table->string('antiguedad');
            $table->integer('moradores');
            $table->string('tipo');
            $table->bigInteger('luz_proveedor_id')->unsigned()->nullable();
            $table->bigInteger('gas_proveedor_id')->unsigned()->nullable();  
            $table->bigInteger('user_id')->unsigned()->nullable(); // Nullable para Inmuebles Prototipo
            $table->timestamps();
            //FKs
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('luz_proveedor_id')->references('id')->on('proveedores');
            $table->foreign('gas_proveedor_id')->references('id')->on('proveedores');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
}
