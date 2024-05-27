<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedPinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_pins', function (Blueprint $table) {
            $table->id();
            $table->string('pin');
            $table->string('remarks');
            $table->integer('type');
            $table->date('pdate');
            $table->string("owner");
            $table->string("user");
            $table->foreign('owner')->references('username')->on('users')->onDelete('cascade');
            $table->foreign('user')->references('username')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('used_pins');
    }
}
