<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('gender');
            $table->string('phone');
            $table->string('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            // $table->string('FULLNAME')->default('');
            // $table->string('USERNAME')->default('');
           
            // $table->string('GENDER')->default('');
            // $table->string('PHONE')->default('');
            // $table->string('email')->unique();
            // $table->string('password')->default('');
            // $table->rememberToken();
            // $table->string('CUSPHOTO')->default('');
            // $table->tinyInteger('TERMS')->default(0);
            // $table->boolean('STATUS')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
