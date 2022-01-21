<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionHashTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_hash_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');
            $table->unsignedBigInteger('hash_tag_id');
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petition')->onDelete('cascade');
            $table->foreign('hash_tag_id')->references('id')->on('hash_tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petition_hash_tag');
    }
}
