<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_guides', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('booking_id')->unsigned();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')
            ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_guides');
    }
}
