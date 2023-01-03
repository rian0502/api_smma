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
        Schema::create('models', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('nama_model');
            $table->string('id_manufacturer');
            $table->string('id_kategori');
            $table->string('id_supplier');
            $table->string('no_model');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('id_manufacturer')->references('uuid')->on('manufacturer')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('uuid')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('models');
    }
};
