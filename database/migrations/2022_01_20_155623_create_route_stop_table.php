<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transport_route_id');
            $table->unsignedBigInteger('transport_stop_id');
            $table->timestamps();

             $table->foreign('transport_route_id')->references('id')->on('transport_route')->onDelete('cascade');
             $table->foreign('transport_stop_id')->references('id')->on('transport_stop')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_stop');
    }
}
