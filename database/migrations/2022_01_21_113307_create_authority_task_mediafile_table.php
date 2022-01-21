<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityTaskMediafileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_task_mediafile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authority_task_id')->index();
            $table->unsignedBigInteger('mediafile_id')->index();
            $table->timestamps();

            $table->foreign('authority_task_id')->references('id')->on('authority_task')->onDelete('cascade');
            $table->foreign('mediafile_id')->references('id')->on('mediafile')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_task_mediafile');
    }
}
