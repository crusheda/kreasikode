<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->float('dspburuk',6,2);
            $table->float('dspcukup',6,2);
            $table->float('dspbaik',6,2);
            $table->float('tjbjelek',6,2);
            $table->float('tjblumayan',6,2);
            $table->float('tjbbagus',6,2);
            $table->float('pnsburuk',6,2);
            $table->float('pnscukup',6,2);
            $table->float('pnsbaik',6,2);
            $table->float('maxburuk',6,2);
            $table->float('maxbaik',6,2);
            $table->float('z1',6,2);
            $table->float('z2',6,2);
            $table->float('m1',6,2);
            $table->float('m2',6,2);
            $table->float('m3',6,2);
            $table->float('a1',6,2);
            $table->float('a2',6,2);
            $table->float('a3',6,2);
            $table->float('z',6,2);
            $table->rememberToken();
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
        Schema::dropIfExists('output');
    }
}
