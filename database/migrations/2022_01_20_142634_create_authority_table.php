<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('mnemonic_name');
            $table->text('description');
            $table->string('email')->unique();
            $table->string('email_ministry')->unique();
            $table->unsignedBigInteger('address_id')->nullable();

            $table->string('phone', 11)->unique()->nullable();
            $table->unsignedBigInteger('responsible_id')->nullable();

            $table->string('web_resource');
            $table->text('additional_information');
            $table->unsignedBigInteger('authority_type_id');
            $table->tinyInteger('inform_by_email')->default(0);
            $table->tinyInteger('inform_by_sms')->default(0);
            $table->tinyInteger('gen_daily_report')->default(0);
            $table->tinyInteger('is_visible')->default(0);
            $table->timestamps();

            $table->foreign('authority_type_id')->references('id')->on('authority_type')->onDelete('cascade');
            $table->foreign('responsible_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority');
    }
}
