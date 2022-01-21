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
            $table->string('phone', 11)->unique()->nullable();
            $table->string('responsible_person');
            $table->string('web_resource');
            $table->text('additional_information');
            $table->tinyInteger('authority_type');
            $table->tinyInteger('inform_by_email');
            $table->tinyInteger('inform_by_sms');
            $table->tinyInteger('gen_daily_report');
            $table->tinyInteger('is_visible');
            $table->string('avatar_image');
            $table->timestamps();
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
