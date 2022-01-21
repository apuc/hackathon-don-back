<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportTypeRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_type_route', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transport_type_id');
            $table->unsignedBigInteger('transport_route_id');
            $table->timestamps();

            $table->foreign('transport_type_id')->references('id')->on('transport_type')->onDelete('cascade');
            $table->foreign('transport_route_id')->references('id')->on('transport_route')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_type_route');
    }
}
