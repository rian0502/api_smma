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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('id_asset');
            $table->string('id_teknisi');
            $table->text('note');
            $table->timestamps();
            $table->foreign('id_asset')->references('uuid')->on('assets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_teknisi')->references('uuid')->on('teknisi')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('maintenance');
    }
};
