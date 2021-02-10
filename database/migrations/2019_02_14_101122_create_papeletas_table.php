<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapeletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papeletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planilla_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->integer('modalidad_id')->unsigned();
            $table->integer('dias_trabajados')->default(0);
            $table->bigInteger('item')->nullable();
            $table->string('cargo',256);
            $table->string('unidad',256);
            $table->string('cuentabancaria',256)->nullable();
            $table->double('haberbasico')->default(0);
            $table->double('antiguedad')->default(0);
            $table->double('subsidios')->default(0);
            $table->double('otrosingresos')->default(0);
            $table->double('totalingresos')->default(0);
            $table->double('iva')->default(0);
            $table->double('afp')->default(0);
            $table->double('ivaafavor')->default(0);
            $table->double('memomulta')->default(0);
            $table->double('descuentossindicato')->default(0);
            $table->double('retjudicial')->default(0);
            $table->double('otrosdescuentos')->default(0);
            $table->double('totaldescuento')->default(0);
            $table->double('liquidopagable')->default(0);
            $table->boolean('entregado')->default(0);
            $table->timestamps();

            $table->foreign('planilla_id')->references('id')->on('planillas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('modalidad_id')->references('id')->on('modalidads')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papeletas');
    }
}
