<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->bigInteger('sponsor')->index();
            $table->bigInteger('ParentId')->index();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('trx_addres')->nullable();
            $table->integer('rank')->nullable();
            $table->float('package')->nullable();
            $table->enum('active_status',['Active','Pending','Inactive','Block'])->default('Pending');
            $table->date('jdate');
            $table->integer('level');
            $table->string('tpassword');
            $table->timestamp('adate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
