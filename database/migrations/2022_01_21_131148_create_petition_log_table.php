<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_log', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('petition_id')->index();
            $table->unsignedBigInteger('log_type_id')->index();
            $table->dateTime('datetime');
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petition')->onDelete('cascade');
            $table->foreign('log_type_id')->references('id')->on('log_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petition_log');
    }
}
