<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_funds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("user_id_fk")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->float('amount');
             $table->string('txn_no');
             $table->date('bdate');            
             $table->enum('status',['Approved','Pending','Failed'])->default('Pending');
             $table->string('type');
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
        Schema::dropIfExists('buy_funds');
    }
}
