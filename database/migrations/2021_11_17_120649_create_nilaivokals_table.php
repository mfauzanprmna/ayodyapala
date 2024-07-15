<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaivokalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaivokals', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk');
            $table->foreignId('id_juri');
            $table->string('lagu');
            $table->integer('semester');
            $table->decimal('penampilan');
            $table->decimal('teknik');
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
        Schema::dropIfExists('nilaivokals');
    }
}
