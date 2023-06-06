<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_notifications', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('escrow_id')->nullable();

            $table->bigInteger('chat_notificational_id')->nullable();
            $table->string('chat_notificational_type')->nullable();


            $table->text('description')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('is_read_admin')->default(0);
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
        Schema::dropIfExists('chat_notifications');
    }
}
