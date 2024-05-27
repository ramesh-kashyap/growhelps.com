<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('plan')->nullable();
            $table->string('user_id_fk')->nullable();
            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('amount');
            $table->date('sdate');
            $table->enum('status',['Active','Pending'])->default('Pending');
            $table->string('transaction_id')->nullable();
            $table->text('slip')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('active_from')->nullable();
            $table->integer('roiCandition');
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
        Schema::dropIfExists('investments');
    }
}
