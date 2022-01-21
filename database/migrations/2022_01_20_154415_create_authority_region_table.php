<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_region', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authority_id');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();

            $table->foreign('authority_id')->references('id')->on('authority')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_region');
    }
}
