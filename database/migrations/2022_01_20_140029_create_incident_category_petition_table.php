<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentCategoryPetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_category_petition', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');
            $table->unsignedBigInteger('incident_category_id');
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petition')->onDelete('cascade');
            $table->foreign('incident_category_id')->references('id')->on('incident_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_category_petition');
    }
}
