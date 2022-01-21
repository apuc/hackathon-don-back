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
            $table->dateTime('fio_responsible')->nullable();
            $table->string('responsible_email')->nullable();
            $table->string('responsible_phone', 11)->nullable();
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petition')->onDelete('cascade');
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
