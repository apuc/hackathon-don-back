<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityIncidentCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_incident_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_category_id');
            $table->unsignedBigInteger('authority_id');
            $table->timestamps();

            $table->foreign('incident_category_id')->references('id')->on('incident_category')->onDelete('cascade');
            $table->foreign('authority_id')->references('id')->on('authority')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_incident_category');
    }
}
