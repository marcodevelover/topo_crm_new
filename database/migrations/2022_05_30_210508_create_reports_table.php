<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->integer('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipments')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->text('folio');
            // Patrón de referencia
            $table->text('descripcion');
            $table->text('certificado');
            $table->text('calibro');
            $table->text('verificacion');
            // Reporte de medición
            $table->text('temperature');
            $table->boolean('cumple');
            $table->text('pressure');
            $table->text('humidity');
            $table->text('observer');
            $table->text('hour');
            $table->text('sisolev');
            $table->text('specifications');
            $table->longText('observation');
            $table->longText('measurements');
            $table->timestamp('date');
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
        Schema::dropIfExists('reports');
    }
}
