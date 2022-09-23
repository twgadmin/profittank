<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_partner_id')->nullable();
            $table->string('name', 65)->nullable();
            $table->string('video_cover', 65)->nullable();
            $table->string('video_url', 191)->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('user_completion_time')->nullable();
            $table->unsignedTinyInteger('estimate_turnaround_time')->nullable();
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
        Schema::dropIfExists('channels');
    }
}
