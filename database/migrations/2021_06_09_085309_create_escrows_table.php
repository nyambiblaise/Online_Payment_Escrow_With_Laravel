<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escrows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('creator_id')->unsigned()->default(null);
            $table->bigInteger('joiner_id')->unsigned()->default(null);
            $table->decimal('amount',18,8)->default(0);
            $table->string('title',255)->default(null);
            $table->text('rules')->default(null);
            $table->tinyInteger('status')->default(0)->comment('0=> Invited, 1=> Accepted, 2=> Rejected');
            $table->tinyInteger('payment_status')->default(0)->comment('0=> Hold, 1=> release, 2=> disputed, 3 => resolved');
            $table->bigInteger('resolved_by')->default(null)->comment('Admin ID');
            $table->dateTime('resolved_at')->default(null);
            $table->bigInteger('invoice')->default(null);
            $table->text('report')->default(null);
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
        Schema::dropIfExists('escrows');
    }
}
