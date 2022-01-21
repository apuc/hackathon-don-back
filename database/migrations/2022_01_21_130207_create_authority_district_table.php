<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_district', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authority_id');
            $table->unsignedBigInteger('district_id');
            $table->timestamps();

            $table->foreign('authority_id')->references('id')->on('authority')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_district');
    }
}
