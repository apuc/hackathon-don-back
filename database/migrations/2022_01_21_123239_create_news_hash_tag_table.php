<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsHashTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_hash_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hash_tag_id')->index();
            $table->unsignedBigInteger('news_id')->index();
            $table->timestamps();

            $table->foreign('hash_tag_id')->references('id')->on('hash_tag')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_hash_tag');
    }
}
