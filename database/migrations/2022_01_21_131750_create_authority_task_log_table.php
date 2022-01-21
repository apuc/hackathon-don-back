<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityTaskLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_task_log', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('authority_task_id')->index();
            $table->unsignedBigInteger('log_type_id')->index();
            $table->dateTime('datetime');
            $table->timestamps();

            $table->foreign('authority_task_id')->references('id')->on('authority_task')->onDelete('cascade');
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
        Schema::dropIfExists('authority_task_log');
    }
}
