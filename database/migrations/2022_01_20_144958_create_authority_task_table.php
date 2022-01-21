<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');
            $table->tinyInteger('task_type');
            $table->text('explanations')->nullable();
            $table->dateTime('planned_date')->nullable();
            $table->dateTime('work_date')->nullable();

            $table->unsignedBigInteger('responsible_id');
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petition')->onDelete('cascade');
            $table->foreign('responsible_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_task');
    }
}
