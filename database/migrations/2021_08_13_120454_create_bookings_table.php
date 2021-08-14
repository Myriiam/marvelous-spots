<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('guide_id')->unsigned();
            $table->date('visit_start');
            $table->date('visit_end');
            $table->integer('nb_person');
            $table->text('message'); //ou string 255 ?
            $table->timestamp('booked_at');
            $table->decimal('total_price')->nullable();
            $table->enum('status_demand', ['pending', 'paiement', 'rejected', 'booked', 'visit completed'])->default('pending');
            $table->enum('status_offer', ['refused', 'waiting for paiement', 'booked', 'visit completed'])->nullable();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('guide_id')->references('user_id')->on('guides') //
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
        Schema::dropIfExists('bookings');
    }
}
