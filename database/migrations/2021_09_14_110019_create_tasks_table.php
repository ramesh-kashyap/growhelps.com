<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("user_id_fk")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->text('url');
             $table->date('tdate');            
             $table->date('approved_date')->nullable();            
             $table->enum('status',['Approved','Pending','Reject'])->default('Pending');
      
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
        Schema::dropIfExists('tasks');
    }
}
