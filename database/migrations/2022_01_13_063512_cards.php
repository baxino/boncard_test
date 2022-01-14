<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cards',function (Blueprint $table){
           $table->increments('id');
           $table->integer('numerKarty')->length(20);
           $table->integer('PIN')->length(4);
           $table->timestamp('dataAktywacji')->useCurrent();
           $table->date('dataWaznosci');
           $table->decimal('kwota',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cards');
    }
}
