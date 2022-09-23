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
            $table->string('first_name', 24);
            $table->string('last_name', 24)->nullable();
            $table->string('email', 64)->unique();
            $table->string('image', 64)->nullable();
            $table->string('phone_num', 24)->nullable();
            $table->string('mobile_num', 24)->nullable();
            $table->string('company_name', 24)->nullable();
            $table->string('termsofservices', 24)->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedTinyInteger('user_type')->default(0);
            $table->string('password', 60);
            $table->boolean('status')->default(0);
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
