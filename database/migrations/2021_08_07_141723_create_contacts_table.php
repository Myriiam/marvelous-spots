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
            $table->foreignId('sender_id')->unsigned();
            $table->foreignId('receiver_id')->unsigned();
            $table->text('message');
            $table->enum('status', ['read','unread']);
            $table->timestamps();

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
