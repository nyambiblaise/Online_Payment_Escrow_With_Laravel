<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->default(null);
            $table->bigInteger('receiver_id')->unsigned()->default(null);
            $table->tinyInteger('status')->default(0)->comment('0=> request connection, 1=> Connected, 2=> Blocked');
            $table->bigInteger('modified_by')->default(null);
            $table->timestamp('modified_at')->default(null);
            $table->softDeletes();
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
        Schema::dropIfExists('contacts');
    }
}
