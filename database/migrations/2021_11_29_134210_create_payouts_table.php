<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("user_id_fk");         
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('distributor_bonus');
            $table->float('performance_bonus');
            $table->float('level_bonus');
            $table->float('cto_bonus');
            $table->float('magic_bonus');
            $table->float('total');
            $table->float('deduction');
            $table->float('club_deduction');
            $table->float('withdraw_amt');
            $table->float('payable_amt');
            $table->date('ttime');
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
        Schema::dropIfExists('payouts');
    }
}
