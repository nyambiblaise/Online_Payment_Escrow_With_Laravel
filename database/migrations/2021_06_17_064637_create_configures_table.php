<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configures', function (Blueprint $table) {
            $table->id();
            $table->string('site_title',30)->nullable();
            $table->string('time_zone',30)->nullable();
            $table->string('currency',20)->nullable();
            $table->string('currency_symbol',20)->nullable();
            $table->string('theme',40)->nullable();
            $table->integer('fraction_number')->nullable();
            $table->integer('paginate')->nullable();
            $table->boolean('email_verification')->default(0);
            $table->boolean('email_notification')->default(0);
            $table->boolean('sms_verification')->default(0);
            $table->boolean('sms_notification')->default(0);
            $table->decimal('minimum_escrow',11,2)->default(0);
            $table->decimal('maximum_escrow',11,2)->default(0);
            $table->string('sender_email',60)->nullable();
            $table->string('sender_email_name',60)->nullable();
            $table->text('email_description')->nullable();
            $table->text('email_configuration')->nullable();

            $table->boolean('push_notification')->default(0);


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
        Schema::dropIfExists('configures');
    }
}
