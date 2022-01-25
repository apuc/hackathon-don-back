<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->timestamps();

            $table->integer('rating')->default(0);
            $table->integer('level')->default(1);

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
