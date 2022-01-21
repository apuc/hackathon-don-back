<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityAuthorityTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_authority_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authority_id');
            $table->unsignedBigInteger('authority_task_id');
            $table->timestamps();

            $table->foreign('authority_id')->references('id')->on('authority')->onDelete('cascade');
            $table->foreign('authority_task_id')->references('id')->on('authority_task')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_authority_task');
    }
}
