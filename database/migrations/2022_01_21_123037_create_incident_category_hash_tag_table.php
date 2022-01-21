<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentCategoryHashTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_category_hash_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hash_tag_id')->index();
            $table->unsignedBigInteger('incident_category_id')->index();
            $table->timestamps();

            $table->foreign('hash_tag_id')->references('id')->on('hash_tag')->onDelete('cascade');
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
        Schema::dropIfExists('incident_category_hash_tag');
    }
}
