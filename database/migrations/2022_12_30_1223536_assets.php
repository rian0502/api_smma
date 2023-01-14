<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('serial');
            $table->string('id_model');
            $table->string('id_location');
            $table->string('id_supplier');
            $table->string('nama_asset');
            $table->dateTime('purchase_date');
            $table->string('order_number');
            $table->text('notes');
            $table->timestamps();
            $table->foreign('id_model')->references('uuid')->on('models')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_location')->references('uuid')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_supplier')->references('uuid')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
