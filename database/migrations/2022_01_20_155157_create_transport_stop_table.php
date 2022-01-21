<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_stop', function (Blueprint $table) {
            $table->id();
            $table->string('management_company');
            $table->unsignedBigInteger('address_id');
            $table->string('title');
            $table->timestamps();

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
        Schema::dropIfExists('transport_stop');
    }
}
