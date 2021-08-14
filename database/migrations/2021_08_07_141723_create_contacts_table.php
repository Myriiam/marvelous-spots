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
            $table->id()->startingValue(1);
            $table->foreignId('sender_id')->unsigned();
            $table->foreignId('receiver_id')->unsigned();
            $table->text('subject');
            $table->text('message');
            $table->enum('status', ['read','unread'])->default('unread');
            $table->timestamp('date');

            $table->foreign('sender_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')
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
        Schema::dropIfExists('contacts');
    }
}
